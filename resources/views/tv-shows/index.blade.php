@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-12">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular TV Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTVShows as $tvShow)
                    <x-tvshow-card :tvShow="$tvShow" />
                @endforeach
            </div>
        </div>
        <div class="now-playing-movies py-12">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Top rated TV Shows</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($topRatedTVShows as $tvShow)
                    <x-tvshow-card :tvShow="$tvShow" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
