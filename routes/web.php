<?php

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
Route::group(["middleware" => "can:see_admin_area"], function (){
    Route::get('/', function () {
        $partner = Partner::with("journal")->where("user_id","=",request()->user()->id)->first();

        return view('partners.base_admin',["partner"=>$partner]);
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
