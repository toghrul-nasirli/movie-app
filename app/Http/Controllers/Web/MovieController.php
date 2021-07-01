<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index');
    }
}
