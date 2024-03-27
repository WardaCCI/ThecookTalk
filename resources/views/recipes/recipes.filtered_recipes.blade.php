@extends('base')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Recettes filtrées par notation</h1>
        </div>
    </div>

    <div class="row">
        @if($recipes->isEmpty())
            <div class="col-md-12">
                <p>Aucune recette trouvée avec la notation sélectionnée.</p>
            </div>
        @else
            @foreach($recipes as $recipe)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->recipename }}</h5>
                            <p class="card-text">Temps de préparation: {{ $recipe->time }}</p>
                            <p class="card-text">Catégorie: {{ $recipe->category }}</p>
                            <p class="card-text">Type de cuisson: {{ $recipe->cookingtype }}</p>
                            <p class="card-text">Note moyenne: {{ number_format($recipe->ratings->avg('stars'), 1) }}/5</p>
                            <a href="{{ route('recipe.show', ['recipeId' => $recipe->id]) }}" class="btn btn-primary">Voir la recette</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
