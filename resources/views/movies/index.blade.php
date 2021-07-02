@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-12">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $key => $popularMovie)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $popularMovie['poster_path'] }}" alt="{{ $popularMovie['title'] }}" class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $popularMovie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                                    </g>
                                </svg>
                                <span class="ml-1">{{ $popularMovie['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                @if (array_key_exists('release_date', $popularMovies[$key]))
                                    <span>{{ \Carbon\Carbon::parse($popularMovie['release_date'])->format('M d, Y') }}</span>
                                @else
                                    <span>Upcoming</span>
                                @endif
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach ($popularMovie['genre_ids'] as $genreId)
                                    {{ $genres->get($genreId) }}{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Now playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $nowPlayingMovie)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $nowPlayingMovie['poster_path'] }}" alt="{{ $nowPlayingMovie['title'] }}"  class="hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $nowPlayingMovie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                                    </g>
                                </svg>
                                <span class="ml-1">{{ $nowPlayingMovie['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                @if (array_key_exists('release_date', $nowPlayingMovies[$key]))
                                    <span>{{ \Carbon\Carbon::parse($nowPlayingMovie['release_date'])->format('M d, Y') }}</span>
                                @else
                                    <span>Upcoming</span>
                                @endif
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach ($nowPlayingMovie['genre_ids'] as $genreId)
                                    {{ $genres->get($genreId) }}{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
