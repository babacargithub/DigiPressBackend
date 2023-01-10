<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeAbonnementRequest;
use App\Http\Requests\UpdateTypeAbonnementRequest;
use App\Models\Formule;
use Illuminate\Http\Response;

class FormuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {//
        return Formule::all();
    }


    /**
     * Display the specified resource.
     *
     * @param Formule $formule
     * @return Formule
     */
    public function show(Formule $formule)
    {
        //
        return $formule;
    }

}
