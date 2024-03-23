@extends('base')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

<div class="container">
    <div class="row gy-5 mb-5">
        <h1 class="text-center fw-bold my-5">Découvrez nos recettes</h1>
        @foreach($recipes as $recipe)
        <div class="col-md-4">
            <div class="card">
                @if($recipe->images && !$recipe->images->isEmpty())
                <div id="carousel-{{ $recipe->id }}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($recipe->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('uploads/recipes/' . $image->image) }}" class="d-block w-100" alt="{{ $recipe->recipename }}">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $recipe->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $recipe->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">{{ $recipe->recipename }}</h5>
                    <div class="recipe-info d-flex justify-content-between">
                        <p><strong>Temps:</strong> {{ $recipe->time }}</p>
                        <p><strong>Difficulté:</strong> {{ $recipe->difficulty }}</p>
                        <p><strong>Catégorie:</strong> {{ $recipe->category }}</p>
                        <p><strong>Type de cuisson:</strong> {{ $recipe->cookingtype }}</p>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('recipe.show', ['recipeId' => $recipe->id]) }}" class="btn btn-success">Voir la recette</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
