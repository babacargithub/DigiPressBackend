<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbonneRequest;
use App\Http\Requests\UpdateAbonneRequest;
use App\Http\Resources\AchatParutionResource;
use App\Models\Abonne;
use App\Models\AchatParution;
use App\Models\CompteAbonne;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     */
    public function store(StoreAbonneRequest $request)
    {
        //
        $abonne = Abonne::create($request->input());
        $compteAbonne = new CompteAbonne(["solde"=>0]);
        $compteAbonne->abonne()->associate($abonne);
        $compteAbonne->save();
        return $abonne;
    }

    public function abonneExists($phoneNumber)
    {
        /** @var  Abonne $abonne */
        $abonne  = Abonne::with('abonnement')->where("telephone","=",substr($phoneNumber, -9,9))->first();
        if ($abonne == null){
            return (new JsonResponse("Abonne introuvable"))->setStatusCode(404);
        }
        return $abonne;

    }

    /**
     * Display the specified resource.
     *
     * @param Abonne $abonne
     * @return Abonne|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function show(Abonne $abonne)
    {
        //
        return $abonne
            ->with('abonnement')
            ->with("abonnement.formule")
            ->with('compte')
            ->first();

    }
/**
     * Display the specified resource.
     *
     * @param Abonne $abonne
     */
    public function showTransactions(Abonne $abonne_id)
    {
        //
        $solde = $abonne_id->compte->solde;
        $transactions =AchatParutionResource::collection(AchatParution::where("abonne_id","=",$abonne_id->id)->get());

        return ["solde"=>$solde, "transactions"=>$transactions];
    }


}
