<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeAbonneRequest;
use App\Http\Requests\UpdateTypeAbonneRequest;
use App\Models\CategorieAbonne;

class TypeAbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeAbonneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeAbonneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieAbonne  $typeAbonne
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieAbonne $typeAbonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeAbonneRequest  $request
     * @param  \App\Models\CategorieAbonne  $typeAbonne
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeAbonneRequest $request, CategorieAbonne $typeAbonne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieAbonne  $typeAbonne
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieAbonne $typeAbonne)
    {
        //
    }
}
