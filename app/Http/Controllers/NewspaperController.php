<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal as NPModel;
class NewspaperController extends Controller
{
    //
    public function getNewsPapers()
    {
        return NPModel::all();
    }
    public function saveNewspaper(Request $request)
    {

        $newspapers = NPModel::create($request->all());
        return response($newspapers);

    }
}
