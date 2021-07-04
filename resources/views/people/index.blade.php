@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="popular-people">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular movies</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularPeople as $person)
                    <div class="people mt-8">
                        <a href="{{ route('people.show', $person['id']) }}">
                            <img src="{{ $person['profile_path'] }}" class="rounded-md hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg hover:text-gray-300">{{ $person['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ $person['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
