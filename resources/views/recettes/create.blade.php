<!-- resources/views/recettes/create.blade.php -->
@extends('layouts.app')

@section('content')

<h1 id="title">Créer une nouvelle recette</h1>


    <form action="{{ route('recettes.store') }}" method="post">
        @csrf
        <input type="text" name="titre" placeholder="Titre de la recette">
        <input type="text" name="description"  placeholder="Description de la recette">
        <!-- Autres champs pour les ingrédients, les étapes, etc. -->
        <button type="submit">Ajouter la recette</button>
    </form>
@endsection