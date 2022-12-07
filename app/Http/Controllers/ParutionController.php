<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\PageResource;
use App\Http\Resources\ParutionResource;
use App\Models\AchatParution;
use App\Models\Page;
use App\Models\Parution;
use Illuminate\Database\Eloquent\Builder;

class ParutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date)
    {
        //
        $parutionDuJour = Parution::whereHas("journee", function (Builder $query) use( $date) {
            $query->whereDate('date_parutions', today());
        })->get();
        return response(ParutionResource::collection($parutionDuJour));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parutionPages(Parution $parution)
    {
        //dd
        return response(PageResource::collection($parution->pages));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublicationRequest $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parution  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Parution $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicationRequest  $request
     * @param  \App\Models\Parution  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePublicationRequest $request, Parution $publication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parution  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parution $publication)
    {
        //
    }
    public function getPaymentUrl(){
        $parutions = request()->json("parutions");
        $totalToPay = 0;
        foreach ($parutions as $parution) {
            $totalToPay = $totalToPay + $parution['prix'];
        }
        // create the wave checkout session
        dd($totalToPay);
    }
    public function savePayment(){
        $parutions = request()->json("parutions");
        foreach ($parutions as $parution) {
            $achatParution = new AchatParution(
                [
                    "parution_id"=>$parution["id"],
                    "abonne_id"=>1,
                "prix"=>$parution["prix"],
                "methode_paiement"=>"WAVE",
                ]);
            $achatParution->commission_journal = 12;
            $achatParution->methode_paiement = "WAVE";
            $achatParution->save();

        }
        return $parutions;
        // create the wave checkout session
    }
}
