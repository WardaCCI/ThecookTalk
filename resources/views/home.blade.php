@extends('base')

@section('content')

<div class="d-flex flex-column gap-5">

    <!-- hero -->
    <div class="row d-flex justify-content-center align-items-center mt-3">
        <div class="col-6">
            <img src="{{ asset('uploads/home/hero.png') }}" width="800" height="800" class="object-fit-cover img-fluid" alt="Patissier" />
        </div>

        <div class="col-4 d-flex flex-column justify-content-center gap-5">
            <div class="fw-bold fs-2">
                Partagez votre passion avec le monde
            </div>

            <div class="fs-5">
                The Cook Talk vous aide à partager vos pépites avec
                des milliers de passionnés de cuisines
            </div>


            @if (session()->has('user'))
            <a type="button" href="{{ route('createRecipeForm.show', ['userId' => session()->get('user')['id']]) }}" class="btn btn-primary btn rounded-5 align-self-start fw-bold py-2 px-4">
                Partagez une recette
            </a>
            @else
            <a href="/signin" class="btn btn-primary btn rounded-5 align-self-start fw-bold py-2 px-4">
                Partagez une recette
            </a>
            @endif
        </div>
    </div>

    <!-- search recipes -->
    <div class="d-flex flex-column align-items-center justify-content-center gap-5 my-5">
        <div class="fs-2 fw-bold">
            Trouvez une recette
        </div>

        <div class="d-flex flex-column col-sm-4">
            <div class="border border-1 px-2 py-1 rounded-pill">
                <form method="" action="" class="col d-flex align-items-center justify-content-between gap-4">
                    @csrf
                    <input type="text" placeholder="Chercher une recette ..." class="form-control border border-0 shadow-none bg-transparent" />

                    <button type="button" class="d-flex justify-content-center align-items-center bg-transparent btn border border-0">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <p class="text-center mt-3">
                Exemple : Dessert, Plat, etc.
            </p>
        </div>
    </div>

   <!-- Section Nos Recettes -->
<div class="container mt-12">
    <div class="row">
        <div class="col-md-6">
            <div class="fs-2 fw-bold">
                Nos recettes
            </div>
        </div>

        <div class="col-md-6 text-md-end align-self-center">
            <a href="{{ route('recipe.show', 1) }}" class="text-decoration-none">Voir plus <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4 mt-4">
        <!-- Recette 1 -->
        <div class="col">
            <div class="card position-relative">
                <a href="{{ route('recipe.show', 1) }}">
                    <img src="{{ asset('uploads/home/cake.jpg') }}" class="card-img-top recipe-image" alt="Recette 1">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Cake salé chèvre pesto</h5>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recette 2 -->
        <div class="col">
            <div class="card position-relative">
                <a href="{{ route('recipe.show', 2) }}">
                    <img src="{{ asset('uploads/home/thiep.jpg') }}" class="card-img-top recipe-image" alt="Recette 2">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Riz au poisson</h5>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recette 3 -->
        <div class="col">
            <div class="card position-relative">
                <a href="{{ route('recipe.show', 3) }}">
                    <img src="{{ asset('uploads/home/Burritos.webp') }}" class="card-img-top recipe-image" alt="Recette 3">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Burritos</h5>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recette 4 -->
        <div class="col">
            <div class="card position-relative">
                <a href="{{ route('recipe.show', 4) }}">
                    <img src="{{ asset('uploads/home/fondue.jpg') }}" class="card-img-top recipe-image" alt="Recette 4">
                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                        <h5 class="card-title text-white">Fondue au chocolat</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .recipe-image {
        height: 450px; /* Augmenter la hauteur des images */
        object-fit: cover; /* Gardez les proportions de l'image et masquez les parties dépassantes */
    }
</style>

<!-- Espacement avant la section -->
<div class="mt-11"></div> 

<!-- Section L'équipe ThecookTalk -->
<div class="container mt-8"> 
    <div class="fs-2 fw-bold text-center">
        L'équipe ThecookTalk
    </div>

    <div class="row mt-4">
        <!-- Description de l'équipe -->
        <div class="col-md-6 mb-4"> 
            <p style="text-align: justify; line-height: 1.8; font-size: 20px;">
            "L'équipe ThecookTalk réunit des passionnés de technologie et de cuisine dévoués à offrir une expérience culinaire exceptionnelle. Nous sommes une équipe diversifiée de développeurs, designers et amateurs de cuisine unis par notre engagement à créer une plateforme conviviale et innovante. Notre mission est de permettre aux passionnés de partager leurs recettes, découvrir de nouvelles saveurs et se connecter avec une communauté mondiale de gastronomes. Avec la technologie comme alliée, nous aspirons à inspirer et rassembler les gens autour de la nourriture, pour créer la meilleure expérience culinaire possible."
            </p>
        </div>


        <!-- Photos des membres de l'équipe -->
        <div class="col-md-6">
            <div class="row g-4">
                <!-- Membre 1 -->
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('uploads/home/jawaad.jpg') }}" class="img-fluid rounded" style="max-width: 40%;">
                        <div class="mt-2">
                            <h5>Jawaad Toure ALI</h5>
                            <p>Web Developer</p>
                        </div>
                    </div>
                </div>
                <!-- Membre 2 -->
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('uploads/home/profil.png') }}" class="img-fluid rounded" style="max-width: 40%;">
                        <div class="mt-2">
                            <h5>Baptiste PESENTI</h5>
                            <p>Front-End Engineer</p>
                        </div>
                    </div>
                </div>
                <!-- Membre 3 -->
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('uploads/home/Cisse.jpg') }}" class="img-fluid rounded" style="max-width: 40%;">
                        <div class="mt-2">
                            <h5>Ndieme CISSE</h5>
                            <p>Backend Engineer</p>
                        </div>
                    </div>
                </div>
                <!-- Membre 4 -->
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('uploads/home/profil.png') }}" class="img-fluid rounded" style="max-width: 40%;">
                        <div class="mt-2">
                            <h5>Ouardia LABBACI</h5>
                            <p>Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Espacement après la section -->
<div class="mt-11"></div> 


</div>
@endsection