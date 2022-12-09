<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageRequest;
use App\Models\Journal;
use App\Models\Page;
use App\Models\Parution;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PageCrudController extends CrudController
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
        CRUD::setModel(Page::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/page');
        CRUD::setEntityNameStrings('page', 'pages');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $parutionId = request()->query->get("parution");

        CRUD::column('nom');
        $this->crud->addColumn(["name"=>"image", "type"=>"image", 'label'=>"image"]);
        $this->crud->addColumn(["name"=>"ajouter_article", "type"=>"model_route_link", "route"=>"article.create","model_key"=>"page", 'route_label'=>"Ajouter Article"]);
        $this->crud->addColumn(["name"=>"see_articles", "type"=>"model_route_link", "route"=>"article.index","model_key"=>"page", 'route_label'=>"Articles"]);

        CRUD::column('compteur');
        $this->crud->addClause("where",'parution_id',"=",$parutionId);

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
        CRUD::setValidation(PageRequest::class);
        $parutionId = request()->query->get("parution");
       $this->crud->addField( [
                // Select
                'label'     => "Parution ",
                'type'      => 'select',
                'name'      => 'parution_id', // the db column for the foreign key

                // optional
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity'    => 'parution',
                "placeholder"=>"Sélectionner une parution",

                // optional - manually specify the related model and attribute
                'model'     => Parution::class, // related model
                'attribute' => 'label', // foreign key attribute that is shown to user

                // optional - force the related options to be a custom query, instead of all();
                'options'   => (function ($query) use ($parutionId) {
                    return $query->where("id","=",$parutionId)->get();
                }),
        ]);
//        CRUD::field('parution_id');
        CRUD::field('numero');
        CRUD::field('nom');

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

//    protected function setupCreateRoutes($segment, $routeName, $controller)
//    {
////        dd($segment, $routeName, $controller);
//    }
//    public function store()
//    {
//        Page::create(request()->input());
//        return redirect('index');
//
//    }


}
