<div x-data="{ isOpen: true }" @click.away="isOpen = false" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false" @keydown="isOpen = true" class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" @focus="isOpen = true" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search...">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    <div x-show.transition.opacity="isOpen" class="absolute bg-gray-800 rounded text-sm w-64 mt-4 z-10">
        <ul>
            @forelse ($searchResults as $result)
                <li class="border-b border-gray-800">
                    <a href="{{ route('movies.show', $result['id']) }}" @if ($loop->last) @keydown.tab="isOpen = false" @endif class="flex items-center hover:bg-gray-700 px-4 py-3">
                        @if ($result['poster_path'])
                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" class="w-8">
                        @else
                            <img src="{{ asset('img/no-poster.png') }}" class="w-8">
                        @endif
                        <span class="ml-4">{{ $result['title'] }}</span>
                    </a>
                </li>
            @empty
                @if (strlen($search) >= 2)
                    <li class="border-b border-gray-800 px-4 py-3">
                        No results for "{{ $search }}"
                    </li>
                @endif
            @endforelse
        </ul>
    </div>
</div>
