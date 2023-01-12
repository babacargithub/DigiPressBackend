<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Http\Resources\ParutionResource;
use App\Models\Abonne;
use App\Models\AchatParution;
use App\Models\Parution;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ParutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $date
     * @return Response
     */
    public function index($date): Response
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
     * @param Parution $parution
     * @return Response
     */
    public function parutionPages(Parution $parution): Response
    {
        //dd
        return response(PageResource::collection($parution->pages));
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
    public function paymentSuccessCallback(): ?JsonResponse
    {

        try {
            $data = json_decode(request()->getContent(), true);
            $clientId = $data['client_id'];
            $montant = $data['montant'];
            $compte = Abonne::with('compte')->find($clientId)->compte;
            $compte->augmenterSolde($montant);
            $compte->save();


            return new JsonResponse(["status" => "OK: Payment saved"]);
        } catch (\Exception $e) {
           Log::error("unable to save payment, error Happened");
           Log::error($e->getMessage().' '. $e->getTraceAsString());
            return  null;
        }
    }
}
