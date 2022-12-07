<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaiementRequest;
use App\Http\Requests\UpdatePaiementRequest;
use App\Models\AchatParution;

class PaiementController extends Controller
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
     * @param  \App\Http\Requests\StorePaiementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaiementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AchatParution  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(AchatParution $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaiementRequest  $request
     * @param  \App\Models\AchatParution  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaiementRequest $request, AchatParution $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AchatParution  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AchatParution $paiement)
    {
        //
    }
}
