<!-- resources/views/recettes/index.blade.phpyyyyy -->
@extends('layouts.app') 
@section('content')

<h1>Liste des recettes</h1>
@dd($recettes)

<ul>
    @foreach ($recettes as $recette)
        <li>
            <a href="{{ route('recettes.show', $recette->id) }}">{{ $recette->titre }}</a>
            
            <!-- Affichez d'autres détails de la recette si nécessaire -->
            <link rel="stylesheet" href="{{ asset('public\css\styles.css') }}">
        </li>
    @endforeach
</ul>
@endsection
  