<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppelOffreRequest;
use App\Http\Requests\UpdateAppelOffreRequest;
use App\Http\Resources\AppelOffreResource;
use App\Models\AppelOffre;
use Illuminate\Http\Response;

class AppelOffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return response(AppelOffreResource::collection(AppelOffre::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAppelOffreRequest $request
     * @return Response
     */
    public function store(StoreAppelOffreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param AppelOffre $appelOffre
     * @return Response
     */
    public function show(AppelOffre $appelOffre)
    {
        //
        $appelOffre = AppelOffre::find(request()->route()->parameter("appels_offre"));
        return response(new AppelOffreResource($appelOffre));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AppelOffre $appelOffre
     * @return Response
     */
    public function edit(AppelOffre $appelOffre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAppelOffreRequest $request
     * @param AppelOffre $appelOffre
     * @return Response
     */
    public function update(UpdateAppelOffreRequest $request, AppelOffre $appelOffre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AppelOffre $appelOffre
     * @return Response
     */
    public function destroy(AppelOffre $appelOffre)
    {
        //
    }
}
