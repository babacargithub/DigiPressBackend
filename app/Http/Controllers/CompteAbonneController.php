<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompteAbonneRequest;
use App\Http\Requests\UpdateCompteAbonneRequest;
use App\Models\Abonne;
use App\Models\CompteAbonne;
use Illuminate\Http\JsonResponse;

class CompteAbonneController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param CompteAbonne $compteAbonne
     * @return JsonResponse
     */
    public function getWavePaymentUrl(CompteAbonne $compteAbonne): JsonResponse
    {
        //
        $link = "https://pay.wave.com/c/cos-1br4q87j8105j?a=3300&c=XOF&m=Golob%20One";
        $montant = request()->input('montant');
        $compteAbonne->save();
       return  new JsonResponse(["launch_url"=>$link]);
    }/**
     * Display the specified resource.
     *
     * @param CompteAbonne $compteAbonne
     * @return JsonResponse
     */
    public function soldeDisponible(Abonne $abonne): JsonResponse
    {
        //
        $montant = request()->input('montant');
       return  new JsonResponse(["solde_disponible"=> $abonne->compte->soldeDisponible($montant)]);
    }


}
