<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJourneeRequest;
use App\Http\Requests\UpdateJourneeRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\JourneeResouce;
use App\Models\Article;
use App\Models\Journee;
use App\Models\Theme;

class JourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(JourneeResouce::collection(Journee::all()));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function journeeThemeArticles(Journee $journee, Theme $theme)
    {
        //
        return response(ArticleResource::collection(Article::where("theme_id",$theme->id)->get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJourneeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJourneeRequest $request)
    {
        //
        return  Journee::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journee  $journee
     * @return \Illuminate\Http\Response
     */
    public function show(Journee $journee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJourneeRequest  $request
     * @param  \App\Models\Journee  $journee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJourneeRequest $request, Journee $journee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journee  $journee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journee $journee)
    {
        //
    }
}
