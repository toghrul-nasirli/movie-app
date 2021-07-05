@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="popular-people">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular people</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularPeople as $person)
                    <div class="person mt-8">
                        <a href="{{ route('people.show', $person['id']) }}">
                            <img src="{{ $person['profile_path'] }}" class="rounded-md hover:opacity-75 transition ease-in-out duration-200">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('people.show', $person['id']) }}" class="text-lg hover:text-gray-300">{{ $person['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">{{ $person['known_for'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="page-load-status">
            <div class="flex justify-center my-8">
                <div class="infinite-scroll-request spinner text-4xl">&nbsp;</div>
            </div>
            <div class="infinite-scroll-last">End of content</div>
            <div class="infinite-scroll-error">Error</div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll(elem, {
            path: '/people/page/@{{#}}',
            append: '.person',
            status: '.page-load-status',
        });
    </script>
@endsection
