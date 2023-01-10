<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbonnementRequest;
use App\Http\Requests\UpdateAbonnementRequest;
use App\Models\Abonnement;
use App\Models\Formule;
use Illuminate\Http\Response;

class AbonnementController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAbonnementRequest $request
     * @return Abonnement
     */
    public function store(StoreAbonnementRequest $request): Abonnement
    {
        //

        $abonnement = new Abonnement($request->input());
        $formule = Formule::findOrFail($request->input()["formule_id"]);
        $abonnement->date_expiration = now()->addDays($formule->duree);
        $abonnement->save();
        return  $abonnement;
    }

    /**
     * Display the specified resource.
     *
     * @param Abonnement $abonnement
     * @return Abonnement
     */
    public function show(Abonnement $abonnement)
    {
        //
        return $abonnement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAbonnementRequest $request
     * @param Abonnement $abonnement
     * @return Response
     */
    public function update(UpdateAbonnementRequest $request, Abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Abonnement $abonnement
     * @return Response
     */
    public function destroy(Abonnement $abonnement)
    {
        //
    }
}
