<!-- Dans la vue recipes/index.blade.php -->

@extends('base')

@section('content')

<div class="container">
    <div class="row gy-5 mb-5">
        <h1 class="text-center fw-bold my-5">Découvrez nos recettes</h1>
        @foreach($recipes as $key => $recipe)
            @if($key % 3 == 0) <!-- Ouvre une nouvelle ligne toutes les trois recettes -->
                <div class="row gy-5 mb-5">
            @endif
            <div class="col-md-4">
                <div class="card h-100 recipe-card">
                    @if($recipe->images && !$recipe->images->isEmpty())
                    <div id="carousel-{{ $recipe->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($recipe->images as $imgKey => $image)
                            <div class="carousel-item {{ $imgKey == 0 ? 'active' : '' }}">
                                <img src="{{ asset('/' . $image->image) }}" class="d-block w-100 recipe-image img-fluid" alt="{{ $recipe->recipename }}"> <!-- Ajout de la classe "img-fluid" pour rendre les images réactives -->
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
                    <div class="card-body recipe-info">
                        <h5 class="card-title text-center mb-3">{{ $recipe->recipename }}</h5>
                        <div class="recipe-details d-flex justify-content-between">
                            <div class="d-flex gap-2">
                                <i class="bi bi-alarm-fill"></i> {{ $recipe->time }}
                            </div>
                            <div class="d-flex gap-2">
                                <span class="material-symbols-outlined">
                                    restaurant_menu
                                </span>{{ $recipe->category }}
                            </div>
                            <div class="d-flex gap-2">
                                <span class="material-symbols-outlined">
                                    cooking
                                </span>{{ $recipe->cookingtype }}
                            </div>
                        </div>
                        <!-- Affichage de la note de la recette avec un système d'étoiles -->
                        <div class="text-center mt-3">
                            Note :
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $recipe->rating)
                                    <span class="star">★</span>
                                @else
                                    <span class="star">☆</span>
                                @endif
                            @endfor
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('recipe.show', ['recipeId' => $recipe->id]) }}" class="btn btn-success btn-voir-recette">Voir la recette</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(($key + 1) % 3 == 0 || $loop->last) <!-- Ferme la ligne après chaque troisième recette ou si c'est la dernière recette -->
                </div>
            @endif
        @endforeach
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
<link rel="stylesheet" href="{{ asset('css/rating_stars.css') }}">
@endsection
