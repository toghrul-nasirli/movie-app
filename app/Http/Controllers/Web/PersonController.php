<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\ViewModels\PeopleViewModel;
use Illuminate\Support\Facades\Http;

class PersonController extends Controller
{
    public function index()
    {
        $popularPeople = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/popular')
            ->json()['results'];

        $viewModel = new PeopleViewModel($popularPeople);

        return view('people.index', $viewModel);
    }

    public function show()
    {
        return view('people.show');
    }
}
