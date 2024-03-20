 
<?php $__env->startSection('head'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-center">
        <?php $__currentLoopData = $recipename; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <h1 class="recipe-name"><?php echo e($name); ?></h1>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

   
    <div class="recipe-container">
        <div class="recipe-time">
            <?php $__currentLoopData = $time; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong>Temps : </strong> <?php echo e($t); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="recipe-cookingtype">
            <?php $__currentLoopData = $cookingtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong>Type de cuisson : </strong><?php echo e($cooking); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    
        <div class="recipe-difficulty">
            <?php $__currentLoopData = $difficulty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $difficult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong>Difficulté : </strong><?php echo e($difficult); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    
        <div class="recipe-category">
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><strong>Type de plat : </strong><?php echo e($cate); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <form action="/action_page.php" method="post" id="recipe-form" class="text-center">
        <label for="personne"><strong>Nombre de personnes :</strong></label>
        <input type="number" id="personne" name="personne" value="1" min="1">
    </form>
      
      


    <p class="text-center1"><strong>Ingrédients :</strong></p>
    <div class="ingredients-container" id="ingredient-container">
        <?php $__currentLoopData = $ingredientCalories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredientCalorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($ingredientCalorie['ingredient_name']); ?> : <?php echo e($ingredientCalorie['calorie']); ?> cal </p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <p class="text-center1"><strong>Quantité :</strong></p>
    <div class="ingredients-container" id="ingredient-container">
        <?php $__currentLoopData = $ingredientQuantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ingredientQuantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($ingredientQuantity['ingredient_name']); ?> :  <span id="ingredient-quantity-<?php echo e($key); ?>"> <?php echo e($ingredientQuantity['quantity']); ?></span> <?php echo e($ingredientQuantity['unit']); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <p class="text-center1"><strong>Les étapes :</strong></p>
    <ol class="step-list">
        <?php $__currentLoopData = $stepRecipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="step-item">
                <p><?php echo e($step['description']); ?></p>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>

    <div class="rating-container">
        <form action="<?php echo e(route('comment.form', $recipeId)); ?>" method="post">

            <?php echo csrf_field(); ?>
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
          <?php $__currentLoopData = $commentRecipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentRecipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p>  <?php echo e($commentRecipe['note']); ?><span class="star1">&#9733;</span> <?php echo e($commentRecipe['pseudo']); ?> : <?php echo e($commentRecipe['comment']); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/projet recette/resources/views/recipeView/recipe.blade.php ENDPATH**/ ?>