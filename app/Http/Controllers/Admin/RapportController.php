<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abonne;
use App\Models\Abonnement;
use App\Models\AchatParution;
use App\Models\CompteAbonne;
use App\Models\ComptePartner;
use App\Models\RechargeCompte;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Carbon;

class RapportController extends CrudController
{
    //
    public function rapports()
    {
        $vente_mois = AchatParution::whereMonth('created_at',Date('m'))->sum('prix');
        $vente_semaine = AchatParution::whereBetween('created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('prix');
        $vente_journee = AchatParution::whereDate('created_at',Date('Y-m-d'))->sum('prix');;
        $recharges = RechargeCompte::whereDate('created_at',Date('Y-m-d'))->sum('montant');;
        $vente_annnee = AchatParution::whereYear('created_at',Date('Y'))->sum('prix');

        return view('admin.rapports.rapports',[
            "ventes_mois"=>$vente_mois,
            "vente_journee"=>$vente_journee,
            "vente_semaine"=>$vente_semaine,
            "vente_annee"=>$vente_annnee,
            "recharges"=>$recharges
            ]);

    }
    //
    public function soldes()
    {
        $soldeAbonnes = CompteAbonne::sum('solde');
        $soldePartners = ComptePartner::sum('solde');

        return view('admin.rapports.soldes',[
            "solde_comptes_abonnes"=>$soldeAbonnes,
            "solde_comptes_partenaires"=>$soldePartners,
            ]);

    }
    public function stats()
    {
        $nombreClients = Abonne::count();
        $nombreAbonnes = Abonnement::count();
        $achatsClient = AchatParution::count();

        return view('admin.rapports.stats',[
            "nombre_clients" => $nombreClients,
            "nombre_abonnes" => $nombreAbonnes,
            "nombre_achats"  => $achatsClient
            ]);

    }
}
