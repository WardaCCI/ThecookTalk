 @extends('users.base')
@section('head')
   
@endsection

@section('content')
    <div class="text-center">
        @foreach($recipename as $name)
            <h1 class="recipe-name">{{ $name }}</h1>
        @endforeach
    </div>

   
    <div class="recipe-container">
        <div class="recipe-time">
            @foreach($time as $t)
                <p><strong>Temps : </strong> {{ $t }}</p>
            @endforeach
        </div>
        
        <div class="recipe-cookingtype">
            @foreach($cookingtype as $cooking)
                <p><strong>Type de cuisson : </strong>{{ $cooking }}</p>
            @endforeach
        </div>
    
        <div class="recipe-difficulty">
            @foreach($difficulty as $difficult)
                <p><strong>Difficulté : </strong>{{ $difficult }}</p>
            @endforeach
        </div>
    
        <div class="recipe-category">
            @foreach($category as $cate)
                <p><strong>Type de plat : </strong>{{ $cate }}</p>
            @endforeach
        </div>
    </div>

    <form action="/action_page.php" method="post" id="recipe-form" class="text-center">
        <label for="personne"><strong>Nombre de personnes :</strong></label>
        <input type="number" id="personne" name="personne" value="1" min="1">
    </form>
      
      


    <p class="text-center1"><strong>Ingrédients :</strong></p>
    <div class="ingredients-container" id="ingredient-container">
        @foreach($ingredientCalories as $ingredientCalorie)
            <p>{{ $ingredientCalorie['ingredient_name'] }} : {{ $ingredientCalorie['calorie'] }} cal </p>
        @endforeach
    </div>
    
    <p class="text-center1"><strong>Quantité :</strong></p>
    <div class="ingredients-container" id="ingredient-container">
        @foreach($ingredientQuantities as  $key => $ingredientQuantity)
            <p>{{ $ingredientQuantity['ingredient_name'] }} :  <span id="ingredient-quantity-{{$key}}"> {{$ingredientQuantity['quantity']}}</span> {{ $ingredientQuantity['unit'] }}</p>
        @endforeach
    </div>

    <p class="text-center1"><strong>Les étapes :</strong></p>
    <ol class="step-list">
        @foreach($stepRecipe as $index => $step)
            <li class="step-item">
                <p>{{ $step['description'] }}</p>
            </li>
        @endforeach
    </ol>

    <div class="rating-container">
        <form action="{{ route('comment.form', $recipeId) }}" method="post">

            @csrf
            <div class="rating">
                <input type="hidden" name="rating" id="rating-value" value="0">
                <span class="star" data-rating="5">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="1">&#9733;</span>
            </div>
      </div>
      
      <p class="text-center2"><strong>Commentaires :</strong></p>
        <div class= "comment-container">
          @foreach($commentRecipes as $commentRecipe)
              <p>  {{ $commentRecipe['note'] }}<span class="star1">&#9733;</span> {{ $commentRecipe['pseudo'] }} : {{$commentRecipe['comment']}}</p>
          @endforeach
      </div>


    <script>

             var quantityInput = document.getElementById('personne');

        quantityInput.addEventListener('input', function() {
            var quantity = parseInt(this.value);
            var ingredientQuantities = <?php echo json_encode($ingredientQuantities); ?>;
            ingredientQuantities.forEach(function(ingredient, index) {
                var originalQuantity = parseInt(ingredient.quantity);
                var multipliedQuantity = originalQuantity * quantity;
                document.getElementById('ingredient-quantity-' + index).textContent = multipliedQuantity;
            });
        });

        // Empêcher la soumission du formulaire lors de l'appui sur Entrée
        quantityInput.addEventListener('keydown', function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                return false;
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            // Lorsqu'une étoile est cliquée
            star.addEventListener('click', function() {
                // Récupérer la valeur de notation associée à l'étoile
                const rating = parseInt(this.getAttribute('data-rating'));
                // Mettre à jour la valeur de notation dans le champ de formulaire caché
                document.getElementById('rating-value').value = rating;

                // Facultatif : Mettre en surbrillance visuellement les étoiles sélectionnées
                stars.forEach(s => {
                    const starRating = parseInt(s.getAttribute('data-rating'));
                    if (starRating <= rating) {
                        s.classList.add('selected');
                    } else {
                        s.classList.remove('selected');
                    }
                });

                // Soumettre le formulaire lorsque l'utilisateur clique sur une étoile
                this.closest('form').submit();
            });
        });
    });
    </script>

@endsection