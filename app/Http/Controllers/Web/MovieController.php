<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $popularMovies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        return view('movies.index', compact('popularMovies'));
    }

    public function show()
    {
        return view('movies.show');
    }
}
