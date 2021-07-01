@extends('layouts.app')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container flex items-center flex-col md:flex-row mx-auto px-4 py-16">
            <img src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ryjHVu68Hgk368sS8KpdzHapx3J.jpg" alt="loki" class="w-64 md:w-80">
            <div class="md:ml-24">
                <div class="text-4xl font-semibold mt-2 md:mt-0">Loki (2021)</div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm mt-1">
                    <svg class="fill-current text-yellow-500 w-4" viewBox="0 0 24 24">
                        <g data-name="Layer 2">
                            <path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star" />
                        </g>
                    </svg>
                    <span class="ml-1">81%</span>
                    <span class="mx-2">|</span>
                    <span>June 9, 2021</span>
                    <span class="mx-2">|</span>
                    <span>Drama, Sci-Fi, Fantasy</span>
                </div>

                <p class="text-gray-300 mt-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad non molestias eos ab numquam! Recusandae nihil explicabo itaque suscipit necessitatibus assumenda distinctio excepturi inventore veritatis illo? Nisi esse facilis veniam eum aliquam nobis repellendus amet repudiandae quos nostrum quod velit adipisci accusamus ipsa enim, quo, modi ipsam rem, perferendis temporibus.
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Michael Waldron</div>
                            <div class="text-sm text-gray-400">Creator</div>
                        </div>
                        <div class="ml-8">
                            <div>Tom Hiddelston</div>
                            <div class="text-sm text-gray-400">Actor</div>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <button class="flex items-center bg-yellow-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-600 transition ease-in-out duration-200">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ryjHVu68Hgk368sS8KpdzHapx3J.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Actor</a>
                        <div class="text-sm text-gray-400">Role</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ryjHVu68Hgk368sS8KpdzHapx3J.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Actor</a>
                        <div class="text-sm text-gray-400">Role</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ryjHVu68Hgk368sS8KpdzHapx3J.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Actor</a>
                        <div class="text-sm text-gray-400">Role</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/ryjHVu68Hgk368sS8KpdzHapx3J.jpg" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray:300">Actor</a>
                        <div class="text-sm text-gray-400">Role</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w533_and_h300_bestv2/Afp8OhiO0Ajb3NPoCBvfu2pqaeO.jpg" alt="image1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w533_and_h300_bestv2/Afp8OhiO0Ajb3NPoCBvfu2pqaeO.jpg" alt="image1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w533_and_h300_bestv2/Afp8OhiO0Ajb3NPoCBvfu2pqaeO.jpg" alt="image1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="https://www.themoviedb.org/t/p/w533_and_h300_bestv2/Afp8OhiO0Ajb3NPoCBvfu2pqaeO.jpg" alt="image1" class="hover:opacity-75 transition ease-in-out duration-200">
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
