<!-- resources/views/recettes/edit.blade.php -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('public\css\styles.css') }}">
<h1>Modifier la recette</h1>
<h1>Modifier la recette</h1>
    <form action="{{ route('recettes.update', $recette->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="titre" value="{{ $recette->titre }}">
        <!-- Autres champs pour les ingrédients, les étapes, etc. -->
        <button type="submit">Enregistrer les modifications</button>
    </form>
@endsection

