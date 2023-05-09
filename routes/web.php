<?php

use App\Http\Controllers\Admin\JourneeCrudController;
use App\Http\Controllers\Admin\PageCrudController;
use App\Http\Controllers\CompteAbonneController;
use App\Http\Controllers\PageController;
use App\Models\Partner;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/recharger_mon_compte/client/{abonne}",[CompteAbonneController::class, "rechargeCompte"]);

Route::group(["middleware" => "can:see_admin_area"], function (){
    Route::get('/', function () {
        $partner = Partner::with("journal")->where("user_id","=",request()->user()->id)->first();

        return view('partners.base_admin',["partner"=>$partner]);
    });
});


Route::get('/test-vue', function () {
    return view('test_vue');
});
Route::any('/{parution}/create_multiple_pages',[PageCrudController::class ,"savePagesImages"])->name("create_multiple_pages");
Route::any('/journees/{journee}/creer_depuis_images',[JourneeCrudController::class ,"createParutionsFromImages"])->name("parution.creer_depuis_images");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
