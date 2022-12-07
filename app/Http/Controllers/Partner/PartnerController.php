<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbonneRequest;
use App\Http\Requests\UpdateAbonneRequest;
use App\Models\Abonne;
use App\Models\Partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return response(JsonResource::collection(Partner::find(1)->journal->achatsDuJour()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function ventesDuJour()
    {
        //
        return response(JsonResource::collection(Partner::find(1)->journal->achatsDuJour()));

    }/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function parutionsMois()
    {
        //
        return response(JsonResource::collection(Partner::find(1)->journal->parutionsDuMois()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function stats()
    {
        //
        return response(JsonResource::collection(Partner::find(1)->journal->parutionsDuMois()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function rapports()
    {
        //
        $journal = Partner::find(1)->journal;
        $totalVenteDuJour = $journal->totalAchat(today()->subDay(),today()->addDay());
        $venteSemaine = $journal->totalAchat(today(),today());
        $venteMois = $journal->totalAchat(today(),today());
        $data = [
            "jour"=> intval($totalVenteDuJour),
            "mois"=>intval($venteSemaine),
            "semaine"=>intval($venteMois),
            "user"=>Auth::user()
            ];
        return response()->json($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbonneRequest  $request
     * @return Response
     */
    public function store(StoreAbonneRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Abonne $abonne
     * @return Response
     */
    public function show(Abonne $abonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbonneRequest  $request
     * @param Abonne $abonne
     * @return Response
     */
    public function update(UpdateAbonneRequest $request, Abonne $abonne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Abonne $abonne
     * @return Response
     */
    public function destroy(Abonne $abonne)
    {
        //
    }
}
