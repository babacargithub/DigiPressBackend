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
        $demo = env("DEMO");
        if ($demo){
            $date = "2023-02-25";
        }
        $parutionDuJour = Parution::whereHas("journee", function (Builder $query) use( $date) {
            $query->whereDate('date_parutions',$date);
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
            $alreadyPurchasedParution = AchatParution::whereParutionId($parution["id"])->whereAbonneId($clientId)->first();
            if ($alreadyPurchasedParution == null)
            {
                $achatParution = new AchatParution(
                    [
                        "parution_id" => $parution["id"],
                        "abonne_id" => $clientId,
                        "prix" => $parution["prix"],
                        "methode_paiement" => "WAVE",
                    ]);
                $achatParution->commission_journal = $achatParution->parution->journal->commission;
                $achatParution->methode_paiement = "WAVE";
                $achatParution->save();
                // augmenter solde partenaire 
                $comptePartenaire = $achatParution->parution->journal->partner->comptePartner;
                $comptePartenaire->augmenterSolde($achatParution->commission_journal);
                $comptePartenaire->save();
            }else{
                $totalToPay = $totalToPay - $alreadyPurchasedParution->prix;
            }

        }
        $compte->diminuerSolde($totalToPay);
        $compte->save();

        return $parutions;
        // create the wave checkout session
    }
}
