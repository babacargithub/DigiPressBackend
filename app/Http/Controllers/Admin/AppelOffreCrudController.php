<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AppelOffreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AppelOffreCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AppelOffreCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\AppelOffre::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/appel-offre');
        CRUD::setEntityNameStrings('appel offre', 'appel offres');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('titre');
        CRUD::column('sous_titre');
        CRUD::column('contenu');
        CRUD::column('publie_dans');
        CRUD::column('date_limite');
        CRUD::column('domaine');
        CRUD::column('cahier');
        CRUD::column('prix_cahier');
        CRUD::column('autorite');
        CRUD::column('adresse_autorite');
        CRUD::column('created_at');

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
        CRUD::setValidation(AppelOffreRequest::class);

        CRUD::field('titre');
        CRUD::field('sous_titre');
        CRUD::field('contenu');
        CRUD::field('publie_dans');
        CRUD::field('date_limite');
        CRUD::field('domaine');
        CRUD::field('cahier');
        CRUD::field('prix_cahier');
        CRUD::field('autorite');
        CRUD::field('adresse_autorite');

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
