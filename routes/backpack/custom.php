<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('journal', 'JournalCrudController');
    Route::crud('journee', 'JourneeCrudController');
    Route::get('journee/{journee}/show_parutions', 'JourneeCrudController@showJourneeParutions')->name("show_parutions");
    Route::crud('parution', 'ParutionCrudController');
    Route::crud('page', 'PageCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('abonne', 'AbonneCrudController');
    Route::crud('theme', 'ThemeCrudController');
    Route::crud('appel-offre', 'AppelOffreCrudController');
    Route::crud('partner', 'PartnerCrudController');
}); // this should be the absolute last line of this file