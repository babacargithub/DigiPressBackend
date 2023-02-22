<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Page;
use App\Models\Theme;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ArticleCrudController extends CrudController
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
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $page_id = request()->query->get("page");


        CRUD::column('titre');
        CRUD::column('sous_titre');
        CRUD::column('contenu');
        CRUD::column('page_id');
        CRUD::column('image');
        CRUD::column('compteur');
        $this->crud->addClause("where",'page_id',"=",$page_id);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }
    public function setupShowOperation()
    {

        CRUD::column('titre');
        CRUD::column('sous_titre');
        $this->crud->addColumn(['name'=>'contenu','type'=>'wysiwyg-col']);
        CRUD::column('page_id');
        CRUD::column('image');
        CRUD::column('compteur');


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
        $page_id = request()->query->get("page");
        CRUD::setValidation(ArticleRequest::class);

        CRUD::addField(["name"=>"theme_id","type"=>"select","model"=>Theme::class, "attribute"=>"nom"]);
        CRUD::field('titre');
        CRUD::field('sous_titre');
        CRUD::addField(['name'=>
            'page_id',
            'type'=>'select',
            'model'=>Page::class,
            "attribute"=>"nom",
            "options"=>(function($query) use ($page_id){
                return $query->where("id","=",$page_id)->get();
            })
        ]);
        CRUD::addField(['name'=>'image',
            "label"=>"Image Article",
            'type'=>'upload',
            "upload"=>true]);
        CRUD::addField(['name'=>'contenu','type'=>'wysiwyg']);



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
