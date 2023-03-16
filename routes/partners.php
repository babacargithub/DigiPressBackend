<?php

use App\Http\Controllers\Partner\PartnerController;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;
use App\Models\Partner;
Route::post('/login', function (\Illuminate\Http\Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)) {
        return response(request()->user()->createToken("name"));
    }else{

    return response("Invalid credentials")->setStatusCode(401);
    }

});
Route::middleware("auth:sanctum")->group(function(){

    Route::get("ventes", [PartnerController::class,"ventesDuJour"]);
    Route::get("profile", [PartnerController::class,"index"]);
    Route::get("ventes_du_jour", [PartnerController::class,"ventesDuJour"]);
    Route::get("parutions", [PartnerController::class,"parutionsMois"]);
    Route::get("stats", [PartnerController::class,"stats"]);
    Route::get("rapports", [PartnerController::class,"rapports"]);
    Route::get("users", [PartnerController::class,"rapports"]);
    Route::get("users/add_user", [PartnerController::class,"rapports"]);
    Route::get("users/revoke_user", [PartnerController::class,"rapports"]);
    Route::post("retrait", [PartnerController::class,"retrait"]);
    Route::get("transactions", [PartnerController::class,"transactions"]);
    Route::get("compte", [PartnerController::class,"compte"]);

});
