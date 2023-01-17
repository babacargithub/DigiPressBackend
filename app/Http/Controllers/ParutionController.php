<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Http\Resources\ParutionResource;
use App\Models\Abonne;
use App\Models\AchatParution;
use App\Models\CompteAbonne;
use App\Models\Parution;
use App\Models\RechargeCompte;
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
        /** @var CompteAbonne $compte */
        $compte = Abonne::with('compte')->find($clientId)->compte;

        if (! $compte->soldeDisponible($totalToPay)){
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
           /*
            * TODO augmenter solde partenaire
            $comptePartenaire = $achatParution->journal->partner->compte;
            $comptePartenaire->augmenterSolde($achatParution->commission_journal);
            $comptePartenaire->save();*/

        }
        $compte->diminuerSolde($totalToPay);
        $compte->save();

        return $parutions;
        // create the wave checkout session
    }
    public function paymentSuccessCallback(): ?JsonResponse
    {

        try {
            $data = json_decode(request()->getContent(), true);
            $clientId = $data['client_id'];
            $montant = $data['montant'];
            /** @var  $compte CompteAbonne  */
            $compte = Abonne::with('compte')->find($clientId)->compte;
            $compte->augmenterSolde($montant);
            $compte->save();
            $recharge = new RechargeCompte();
            $recharge->montant = $montant;
            $recharge->compte()->associate($compte);
            $recharge->methode_paiement = "WAVE";
            $recharge->save();


            return new JsonResponse(["status" => "OK: Payment saved"]);
        } catch (\Exception $e) {
           Log::error("unable to save payment, error Happened");
           Log::error($e->getMessage().' '. $e->getTraceAsString());
            return  null;
        }
    }
}
