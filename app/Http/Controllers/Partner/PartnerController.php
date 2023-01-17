<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAbonneRequest;
use App\Http\Requests\UpdateAbonneRequest;
use App\Http\Resources\Partner\PartnerParutionResource;
use App\Http\Resources\VenteResource;
use App\Models\Abonne;
use App\Models\ComptePartner;
use App\Models\Journal;
use App\Models\Partner;
use App\Models\RetraitComptePartner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /** @var Journal */
    public $journal;
    /** @var Partner */
    public $partner;
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function getJournal() : Journal
    {
        $user = request()->user();
            $this->partner = Partner::whereUserId($user->id)->first();
            $this->journal = $this->partner->journal;

            return $this->journal;

    }  public function getPartner() : Partner
    {
            $user = request()->user();
            $this->partner = Partner::whereUserId($user->id)->first();
            return $this->partner;

    }
    public function index()
    {
        //
        return response(VenteResource::collection($this->getJournal()->achatsDuJour()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function ventesDuJour()
    {
        //
        return response(VenteResource::collection($this->getJournal()->achatsDuJour()));

    }/**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\Routing\ResponseFactory|JsonResponse|Response
 */
    public function parutionsMois()
    {
        //
        return response(PartnerParutionResource::collection($this->getJournal()->parutionsDuMois()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function stats()
    {
        //
        return response(JsonResource::collection($this->getJournal()->parutionsDuMois()));

    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function rapports(): JsonResponse
    {
        //
        $journal = $this->getJournal();
        $totalVenteDuJour = $journal->totalAchat(today()->subDay(),today()->addDay());
        $venteSemaine = $journal->totalAchat(today(),today());
        $venteMois = $journal->totalAchat(today()->firstOfMonth(),today()->lastOfMonth());
        $data = [
            "jour"=> intval($totalVenteDuJour),
            "mois"=>intval($venteSemaine),
            "semaine"=>intval($venteMois),
            "user"=>Auth::user()
            ];
        return response()->json($data);

    }

    public function retrait()
    {
       /** @var ComptePartner $compte */
        $compte = $this->getPartner()->compte;
        $montant = request()->input("montant");
        if (! $compte->soldeDisponible($montant)){
            return  response()->json("solde insuffisant")->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $retrait = new RetraitComptePartner();
        $retrait->montant = $montant;
        $retrait->valide = false;
        $retrait->comptePartner()->associate($compte);
        $retrait->valide_le = null;
        $retrait->save();
        $compte->diminuerSolde($montant);
        $compte->save();

        return $retrait;
    }
    public function transactions()
    {
        return RetraitComptePartner::whereComptePartnerId($this->getPartner()->compte->id)
            ->orderByDesc("created_at")
            ->get();
    }
    public function compte()
    {
        return $this->getPartner()->compte;
    }


}
