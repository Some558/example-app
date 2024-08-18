@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Pokemon Search</h1>

    <form action="{{ route('home') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control" placeholder="Enter Pokemon name" value="{{ request('name') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <a href="{{ route('pokemon.random') }}" class="btn btn-secondary mb-3">Get Random Pokemon</a>

    @if(isset($pokemonData) && !empty($pokemonData))
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ ucfirst($pokemonData['name']) }}</h5>
                <img src="{{ $pokemonData['sprites']['front_default'] }}" alt="{{ $pokemonData['name'] }}">
                <p>Types: {{ implode(', ', array_column($pokemonData['types'], 'type.name')) }}</p>
                <p>Height: {{ $pokemonData['height'] / 10 }} m</p>
                <p>Weight: {{ $pokemonData['weight'] / 10 }} kg</p>
            </div>
        </div>
    @elseif(request('name'))
        <p class="alert alert-warning">No Pokemon found with that name.</p>
    @endif
</div>
@endsection