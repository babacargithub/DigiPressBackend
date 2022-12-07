<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ParutionRequest;
use App\Models\Journal;
use App\Models\Journee;
use App\Models\Parution;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Query\Builder;

/**
 * Class ParutionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ParutionCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Parution::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/parution');
        CRUD::setEntityNameStrings('parution', 'parutions');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $journee = request()->query->get("journee");

        $this->crud->addColumn(["name"=>'publie', "type"=>"switch"]);
        $this->crud->addColumn(["name"=>"image_la_une", "type"=>"image", 'label'=>"A la Une"]);
        $this->crud->addColumn(["name"=>"ajouter_page", "type"=>"model_route_link", "route"=>"page.create","model_key"=>"parution", 'route_label'=>"Ajouter Page"]);
        $this->crud->addColumn(["name"=>"see_pages", "type"=>"model_route_link", "route"=>"page.index","model_key"=>"parution", 'route_label'=>"Pages"]);
        CRUD::column('journee_id');
        $this->crud->addClause('where', 'journee_id', '=', $journee);

        CRUD::column('image_la_une');


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ParutionRequest::class);

        $journee = request()->query->get("journee");
        $this->crud->addField([
            'name' => 'publie',
            'label' => 'Publié',
            'type' => 'toggle',
            "value"=>false,
            'view_namespace' => 'toggle-field-for-backpack::fields',
        ]);
        $this->crud->addField([  // Select
            'label'     => "Publié dans la journée",
            'type'      => 'select',
            'name'      => 'journee_id', // the db column for the foreign key

            // optional
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'journee',
            "placeholder"=>"Please select",

            // optional - manually specify the related model and attribute
            'model'     => Journee::class, // related model
            'attribute' => 'label', // foreign key attribute that is shown to user

            // optional - force the related options to be a custom query, instead of all();
            'options'   => (function ($query) use ($journee) {

                return $query->where('id',"=",$journee)->get();
            }), //  you can use this to filter the results show in the select
        ]);
        $this->crud->addField([  // Select
            'label'     => "Journal",
            'type'      => 'select',
            'name'      => 'journal_id', // the db column for the foreign key

            // optional
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'journal',
            "placeholder"=>"Please select",

            // optional - manually specify the related model and attribute
            'model'     => Journal::class, // related model
            'attribute' => 'nom', // foreign key attribute that is shown to user

            // optional - force the related options to be a custom query, instead of all();
            'options'   => (function ($query) use ($journee) {
                $journals = Parution::with("journal")->where("journee_id",$journee)->get();
                $journal_ids = [];
                foreach ($journals as $journal) {
                    $journal_ids[]= $journal->journal->id;
                }
                return Journal::whereNotIn("id",$journal_ids)
                    ->get();
            }), //  you can use this to filter the results show in the select
        ]);

        $this->crud->addField(['name'      => 'image_la_une',
            'label'     => 'Image A La Une',
            'type'      => 'upload',
            'upload'    => true,
            // optional:
            'temporary' => 10 ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
