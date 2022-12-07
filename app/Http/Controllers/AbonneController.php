<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbonneRequest;
use App\Http\Requests\UpdateAbonneRequest;
use App\Models\Abonne;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(Abonne::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbonneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbonneRequest $request)
    {
        //
    }

    public function abonneExists($phoneNumber)
    {
        /** @var  Abonne $abonne */
        $abonne  = Abonne::where("telephone","=",substr($phoneNumber, -9,9))->first();
        return $abonne;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function show(Abonne $abonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbonneRequest  $request
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbonneRequest $request, Abonne $abonne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abonne $abonne)
    {
        //
    }
}
