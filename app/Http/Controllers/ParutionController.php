<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublicationRequest;
use App\Http\Requests\UpdatePublicationRequest;
use App\Http\Resources\PageResource;
use App\Http\Resources\ParutionResource;
use App\Models\Abonne;
use App\Models\AchatParution;
use App\Models\CompteAbonne;
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

    public function getPaymentUrl($parutions){

        // create the wave checkout session
        return $this->calculateTotalToPay($parutions);
    }
    public function calculateTotalToPay($parutions){
        $totalToPay = 0;
        foreach ($parutions as $parution) {
            $totalToPay = $totalToPay + $parution['prix'];
        }
        return $totalToPay;
    }
    public function savePayment(){
        $clientId = request()->header("Client-Id");
        $parutions = request()->json("parutions");
        $totalToPay = $this->calculateTotalToPay($parutions);
        if (! Abonne::with('compte')->find($clientId)->compte->soldeDisponible($totalToPay)){
            abort(403, "Solde insuffisant");
        }
        foreach ($parutions as $parution) {
            $achatParution = new AchatParution(
                [
                    "parution_id"=>$parution["id"],
                    "abonne_id"=> $clientId ,
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
