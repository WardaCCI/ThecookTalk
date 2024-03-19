<!-- resources/views/recettes/show.blade.php -->
@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
<h1>Détails de la recette "{{ $recette->titre }}"</h1>
    <!-- Afficher les détails de la recette ici -->
@endsection
