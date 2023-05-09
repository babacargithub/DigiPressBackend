<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJourneeRequest;
use App\Http\Requests\UpdateJourneeRequest;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\JourneeResource;
use App\Models\Article;
use App\Models\Journee;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class JourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        //
        return response(JourneeResource::collection(Journee::limit(5)->orderByDesc("date_parutions")->get()));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Journee $journee
     * @param Theme $theme
     * @return Response
     */
    public function journeeThemeArticles(Journee $journee, Theme $theme): Response
    {
        //
        return response(ArticleResource::collection(Article::where("theme_id",$theme->id)->get()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJourneeRequest $request
     * @return Journee|Model|Response
     */
    public function store(StoreJourneeRequest $request)
    {
        //
        return  Journee::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param Journee $journee
     * @return JourneeResource
     */
    public function show(Journee $journee)
    {
        //
        return  new JourneeResource($journee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJourneeRequest  $request
     * @param Journee $journee
     * @return Response
     */
    public function update(UpdateJourneeRequest $request, Journee $journee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Journee $journee
     * @return Response
     */
    public function destroy(Journee $journee)
    {
        //
    }
}
