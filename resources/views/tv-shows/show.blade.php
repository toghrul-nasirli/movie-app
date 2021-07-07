@extends('layouts.app')

@section('content')
    <div class="tv-show-info border-b border-gray-800">
        <div class="container flex flex-col md:flex-row mx-auto px-4 py-12">
            <img src="{{ $tvShow['poster_path'] }}" alt="{{ $tvShow['name'] }}" class="rounded-md w-64 md:w-80">
            <div class="md:ml-24">
                <div class="text-4xl font-semibold mt-2 md:mt-0">{{ $tvShow['name'] }}</div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    @if ($tvShow['vote_average'])
                        <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                            <g data-name="Layer 2">
                                <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                            </g>
                        </svg>
                        <span class="ml-1">{{ $tvShow['vote_average'] }}</span>
                        <span class="mx-2">|</span>
                    @endif
                    <span>{{ $tvShow['first_air_date'] }}</span>
                    @if ($tvShow['genres'] && $tvShow['first_air_date'])
                        <span class="mx-2">|</span>
                    @endif
                    <span>{{ $tvShow['genres'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">{{ $tvShow['overview'] }}</p>

                <div class="mt-12">
                    @if (count($tvShow['crew']))
                        <h4 class="text-white font-semibold">Featured Crew</h4>
                        <div class="flex mt-4">
                            @foreach ($tvShow['crew'] as $crew)
                                <div class="mr-8">
                                    <div>{{ $crew['name'] }}</div>
                                    <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div x-data="{ isOpen: false }">
                    @if ($tvShow['trailer'])
                        <div class="mt-12">
                            <button @click="isOpen = true" class="inline-flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-200">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                </svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                        <div x-show.transition.opacity="isOpen" style="background-color: rgba(0, 0, 0, .5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg">
                            <div class="container mx-auto rounded-lg lg:px-32">
                                <div @click.away="isOpen = false" class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click="isOpen = false" @keydown.escape.window="isOpen = false" class="text-3xl hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                            <iframe class="responsive-iframe absolute top-0 left-0 borddsaer-0 w-full h-full" src="{{ $tvShow['trailer'] }}" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (count($tvShow['cast']))
        <div class="tv-show-cast border-b border-gray-800">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Cast</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @foreach ($tvShow['cast'] as $cast)
                        <div class="mt-8">
                            <a href="{{ route('people.show', $cast['id']) }}">
                                <img src="{{ $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="rounded-md hover:opacity-75 transition ease-in-out duration-200">
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('people.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="text-sm text-gray-400">{{ $cast['character'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if (count($tvShow['images']))
        <div class="tv-show-images" x-data="{ isOpen: false, image: ''}">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($tvShow['images'] as $image)
                        <div class="mt-8">
                            <a @click.prevent="isOpen = true; image = '{{ $image['file_path_original'] }}'" href="#">
                                <img src="{{ $image['file_path_w500'] }}" class="hover:opacity-75 transition ease-in-out duration-200">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div x-show.transition.opacity="isOpen" style="background-color: rgba(0, 0, 0, .5);" class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg">
                    <div class="container mx-auto rounded-lg lg:px-32">
                        <div @click.away="isOpen = false; image = ''" class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false; image = ''" @keydown.escape.window="isOpen = false; image = ''" class="text-3xl hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
