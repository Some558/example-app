<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Pokemon Search</h1>

                    <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
                        <div class="flex">
                            <input type="text" name="name" class="flex-1 rounded-l-md border-gray-300" placeholder="Enter Pokemon name" value="{{ request('name') }}">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-md">Search</button>
                        </div>
                    </form>

                    <a href="{{ route('pokemon.random') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Get Random Pokemon</a>

                    @if(isset($pokemonData) && !empty($pokemonData))
                        <div class="mt-4 p-4 border rounded-md">
                            <h2 class="text-xl font-bold">{{ ucfirst($pokemonData['name']) }}</h2>
                            <img src="{{ $pokemonData['sprites']['front_default'] }}" alt="{{ $pokemonData['name'] }}" class="my-2">
                            <p>Types: {{ implode(', ', array_column($pokemonData['types'], 'type.name')) }}</p>
                            <p>Height: {{ $pokemonData['height'] / 10 }} m</p>
                            <p>Weight: {{ $pokemonData['weight'] / 10 }} kg</p>
                        </div>
                    @elseif(request('name'))
                        <p class="mt-4 text-red-500">No Pokemon found with that name.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>