<?php

use App\Http\Controllers\AbonneController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\AppelOffreController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CompteAbonneController;
use App\Http\Controllers\FormuleController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\JourneeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParutionController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ThemeController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("abonnes/phone_number/{phoneNumber}", [AbonneController::class,"abonneExists"]);
Route::get("abonnes/transactions/{abonne_id}", [AbonneController::class,"showTransactions"]);
Route::post("payment_success",[ParutionController::class, "rechargeCompteSuccessCallback"]);
Route::get("parutions/{date}",[ParutionController::class,"index"]);
Route::get("parutions/{parution}/pages",[ParutionController::class,"parutionPages"]);
Route::post("payer",[ParutionController::class,"savePayment"]);
Route::get("journees/{journee}/theme/{theme}/articles",[JourneeController::class,"journeeThemeArticles"]);
Route::resource("journals", JournalController::class);
Route::resource("pages", PageController::class);
Route::resource("journees", JourneeController::class);
Route::resource("abonnes", AbonneController::class);
Route::resource("parutions", ParutionController::class);
Route::resource("articles", ArticleController::class);
Route::resource("themes", ThemeController::class);
Route::apiResource("resumes", ResumeController::class);
Route::apiResource("abonnements", AbonnementController::class);
Route::apiResource("formules", FormuleController::class);
Route::post("comptes_abonne/{abonne}/payment_url", [CompteAbonneController::class,"getWavePaymentUrl"]);
Route::post("comptes_abonne/{abonne}/solde_disponible", [CompteAbonneController::class,"soldeDisponible"]);
Route::prefix('otp')->group(function (){
    Route::post("send_otp", function (){
        return new JsonResponse(["otp_sent"=>true,"should_verify"=>true, ]);
    });
    Route::post("verify_otp", function (){
        return new JsonResponse(["matched"=>true,"client_exists"=>true, ]);
    });
});

