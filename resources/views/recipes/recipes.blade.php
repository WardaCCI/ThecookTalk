@extends('base')

@section('content')
<div class="row gy-3 mb-5">
    <h1 class="text-center fw-bold my-5">Découvrez nos recettes</h1>
    <div class="row">
        @foreach($recipes as $recipe)
        <div class="col-md-4">
            <div class="card">
            <img src="{{ asset($recipe->image_path) }}" class="card-img-top" alt="{{ $recipe->recipename }}">
                <div class="card-body">
                <h5 class="card-title">{{ $recipe->recipename }}</h5>
                <p class="card-text">
                    <span>{{ $recipe->time }}</span>
                    <span>{{ $recipe->difficulty }}</span>
                    <span>{{ $recipe->category }}</span>
                    <span>{{ $recipe->cookingtype }}</span>
                </p>

                    <!-- Ajoutez d'autres informations de recette ici -->
                    <a href="{{ route('recipe.show', ['recipeId' => $recipe->id]) }}" class="btn btn-primary">Voir la recette</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection