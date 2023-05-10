<?php

namespace App\Http\Controllers;

use App\Events\NouvelAchat;
use App\Models\Abonne;
use App\Models\CompteAbonne;
use App\Models\RechargeCompte;
use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
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
        $from = request()->input('from');
        $data = [
            "amount"=> $montant,
            "currency" => "XOF",
            "client_reference"=>json_encode(["type"=>"digipress","client_id"=>$abonne->id]),
            "error_url" => "https://digipress.pro/recharge-error",
            "success_url" =>"https://digipress.pro/".$from,
        ];
        $response = Http::post($url,$data);
        $res = json_decode($response->body());
       return  new JsonResponse(["launch_url"=>$res->wave_launch_url]);
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

    public function rechargeCompteSuccessCallback(): ?Response
    {
        try {
            $data = json_decode(request()->getContent(), true);
                $clientId = $data['client_id'];
                $montant = $data['montant'];
                /** @var  $compte CompteAbonne */
                $compte = Abonne::with('compte')->find($clientId)->compte;
                $recharge = new RechargeCompte();
                $recharge->montant = $montant;
                $recharge->compteAbonne()->associate($compte);
                $recharge->methode_paiement = "WAVE";
                $recharge->save();
                $compte->augmenterSolde($montant);
                $compte->save();
                 NouvelAchat::dispatch( ["id"=>$clientId]);

                Log::info("OK: Payment saved. Request content : " . request()->getContent());
                return new JsonResponse(["status" => "OK: Payment saved"]);


        } catch (\Exception $e) {
            Log::error("unable to save payment, error happened. Request content : ".request()->getContent());
            Log::error($e->getMessage().' '. $e->getTraceAsString());
            return  (new Response())->setStatusCode(500,"Erreur interne");
        }
    }

    public function rechargeCompte(Abonne $client)
    {
        if (request()->isMethod("POST")){

        return view('payment',["success"=>true]);
        }
        return view('payment');
    }


}
