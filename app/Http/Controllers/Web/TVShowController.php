<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\ViewModels\TVShowsViewModel;
use App\ViewModels\TVShowViewModel;
use Illuminate\Support\Facades\Http;

class TVShowController extends Controller
{
    public function index()
    {
        $popularTVShows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'];

        $topRatedTVShows = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/tv/top_rated')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/tv/list')
            ->json()['genres'];

        $viewModel = new TVShowsViewModel($popularTVShows, $topRatedTVShows, $genres);

        return view('tv-shows.index', $viewModel);
    }

    public function show($id)
    {
        $tvShow = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/tv/$id?append_to_response=credits,videos,images")
            ->json();

        $viewModel = new TVShowViewModel($tvShow);

        return view('tv-shows.show', $viewModel);
    }
}
