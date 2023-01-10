<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): AnonymousResourceCollection
    {
        //
        return  ResumeResource::collection(Resume::all());
    }


    /**
     * Display the specified resource.
     *
     * @param Resume $resume
     * @return Resume
     */
    public function show(Resume $resume): Resume
    {
        //
        return $resume;
    }

}
