<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JourneeRequest;
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
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class JourneeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class JourneeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Journee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/journee');
        CRUD::setEntityNameStrings('journée', 'journées');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('date_parutions');
        $this->crud->removeButton("show");
//        $this->crud->addColumn(["name"=>"created_at","type"=>"link","label"=>"Ajouter Parution","url"=>$url]);
//        $this->crud->addColumn(["name"=>"image_la_une", "type"=>"link", "url"=>"jdj", 'label'=>"A la Une"]);
        $this->crud->addButtonFromView("line","voir_parution","voir_parution","beginning");
        $this->crud->addButtonFromView("line","creer_parutions","creer_parutions","beginning");
        $this->crud->addButtonFromView("line",'ajouter_parution',"ajouter_parution","beginning");

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
        CRUD::setValidation(JourneeRequest::class);

        CRUD::field('date_parutions')->type("date")->default(today()->format("DD/MM/YYYY"))->label("Date des Unes ");

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

    public function showJourneeParutions($journee): \Symfony\Component\HttpFoundation\Response
    {
        return redirect()->route('parution.index',["journee"=>$journee]);

    }

    public function createParutionsFromImages(Journee $journee)
    {
        if (request()->isMethod("POST")) {
            $files = request()->file("images");
            if (count($files) > 0) {
                foreach ($files as $file) {

                    $fileName = $file->getClientOriginalName();
                    $fileName = pathinfo($fileName, PATHINFO_FILENAME);
                    /** @var Journal $journal */
                    $journal = Journal::where("nom", "LIKE", "%$fileName%")->first();
                    if ($journal != null) {
                        try {
                            $parution = Parution::whereJourneeId($journee->id)->whereJournalId($journal->id)->first();

                            if ($parution == null) {
                                $parution = new Parution();
                                $parution->setImageLaUneAttribute($file);
                                $parution->journal()->associate($journal);
                                $parution->journee()->associate($journee);
                                $parution->publie = true;
                                $parution->save();
                            }
                        } catch (\Exception $e) {
                            abort(500, $e->getMessage());
                        }
                    }
                }
            }
            return  redirect(route("show_parutions", ["journee"=>$journee->id]));

        } else {

            return view('admin/creer_parutions_images');
        }
    }
}
