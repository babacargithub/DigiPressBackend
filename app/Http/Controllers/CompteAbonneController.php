<?php

namespace App\Http\Controllers;

use App\Models\Abonne;
use App\Models\CompteAbonne;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class CompteAbonneController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param CompteAbonne $compteAbonne
     * @return JsonResponse
     */
    public function getWavePaymentUrl(Abonne $abonne): JsonResponse
    {
        //
        $url = "https://golobone.net/go_travel_v4/public/api/mobile/digipress_wave_url";
        $montant = request()->input('montant');
        $response = Http::post($url,["type"=>"digipress","client_id"=>request()->header("Client_id"),"montant"=>$montant]);
       return  new JsonResponse(["launch_url"=>$response->json("wave_launch_url")]);
    }

    /**
     * Display the specified resource.
     *
     * @param Abonne $abonne
     * @return JsonResponse
     */
    public function soldeDisponible(Abonne $abonne): JsonResponse
    {
        //
        $montant = request()->input('montant');
       return  new JsonResponse(["solde_disponible"=> $abonne->compte->soldeDisponible($montant)]);
    }


}
