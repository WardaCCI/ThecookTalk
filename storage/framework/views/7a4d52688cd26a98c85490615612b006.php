<?php $__env->startSection('content'); ?>
<div class="row gy-4 mb-5">
    <h1 class="text-center fw-bold my-5"><?php echo e($recipe->recipename); ?></h1>

    <div class="d-flex justify-content-between mb-3 px-md-5">
        <div class="d-flex justify-content-center align-items-center gap-2">
            <div class="d-flex justify-content-center align-items-center gap-1 pb-1" id="rating-top">
                <span class="star-comment fs-4 <?php echo e($recipeAverageStars >= '1' ? 'good' : ''); ?>" data-rating="1">&#9733;</span>
                <span class="star-comment fs-4 <?php echo e($recipeAverageStars >= '2' ? 'good' : ''); ?>" data-rating="2">&#9733;</span>
                <span class="star-comment fs-4 <?php echo e($recipeAverageStars >= '3' ? 'good' : ''); ?>" data-rating="3">&#9733;</span>
                <span class="star-comment fs-4 <?php echo e($recipeAverageStars >= '4' ? 'good' : ''); ?>" data-rating="4">&#9733;</span>
                <span class="star-comment fs-4 <?php echo e($recipeAverageStars >= '5' ? 'good' : ''); ?>" data-rating="5">&#9733;</span>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <?php echo e(number_format($recipeAverageStars, 1)); ?>/5
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center gap-2">
            <i class="bi bi-chat-left-text-fill"></i> <?php if($recipeCommentsCount < 2): ?> <?php echo e($recipeCommentsCount); ?> commentaire <?php else: ?> <?php echo e($recipeCommentsCount); ?> commentaires <?php endif; ?> </div>
        </div>


        <div class="row gy-3 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    <?php $__currentLoopData = $recipeImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $recipeImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($key === 0): ?> active <?php endif; ?>">
                        <img src="<?php echo e(asset($recipeImage->image)); ?>" class="d-block w-100 object-fit-contain" height="500" alt="Image de recette de cuisine">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="d-flex justify-content-around align-items-center">
                <div class="d-flex gap-2">
                    <i class="bi bi-alarm-fill"></i> <?php echo e($recipe->time); ?>

                </div>
                <div class="d-flex gap-2">
                    <span class="material-symbols-outlined">
                        restaurant_menu
                    </span></i><?php echo e($recipe->category); ?>

                </div>
               
                <div class="d-flex gap-2">
                    <form id="favoriteForm" method="POST" action="<?php echo e(route('favorite.add')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="recipeId" value="<?php echo e($recipe->id); ?>">
                        <button id="heartButton" type="submit" class="btn d-flex justify-content-center align-items-center border border-0">
                            <i id="heartIcon" class="bi bi-hear"></i>
                        </button>
                    </form>
                </div>
    
    

                <div class="d-flex gap-2">
                    <i class="bi bi-gear-fill"></i><?php echo e($recipe->difficulty); ?>

                </div>
                <div class="d-flex gap-2">
                    <span class="material-symbols-outlined">
                        cooking
                    </span><?php echo e($recipe->cookingtype); ?>

                </div>
            </div>
        </div>

        <div class="row gy-3 mb-5">
            <h3 class="text-center fw-bold">Ingrédients</h3>
    
            <div class="d-flex justify-content-center align-items-center gap-3">
                <button type="button" class="btn d-flex justify-content-center align-items-center border border-0" onclick="decrement()">
                    <i class="bi bi-dash-square-fill"></i>
                </button>
                <span id="recipeFor" data-initial="<?php echo e($recipe->for); ?>"><?php echo e($recipe->for); ?></span> <?php if($recipe->for > 1): ?> <?php echo e($recipeForUnitname); ?>s <?php else: ?> <?php echo e($recipeForUnitname); ?> <?php endif; ?>
                <button type="button" class="btn d-flex justify-content-center align-items-center border border-0" onclick="increment()">
                    <i class="bi bi-plus-square-fill"></i>
                </button>
            </div>
    
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 gx-3 gy-3">
                <?php $__currentLoopData = $recipeQuantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeQuantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex flex-column justify-content-center align-items-center gap-1 mt-5">
                    <div class="fw-semibold ingredient-quantity" data-initial="<?php echo e($recipeQuantity->quantity); ?>" data-unit="<?php echo e($recipeQuantity->unitname); ?>">
                        <?php echo e(number_format($recipeQuantity->quantity * $recipe->for, $recipeQuantity->quantity == (int)$recipeQuantity->quantity ? 0 : 2)); ?> <?php if($recipeQuantity->quantity > 1): ?> <?php echo e($recipeQuantity->unitname); ?>s <?php else: ?> <?php echo e($recipeQuantity->unitname); ?> <?php endif; ?>
                    </div>
                    <div class="">
                        <?php echo e($recipeQuantity->ingredientname); ?>

                    </div>
                    <div class="">
                        <?php echo e(number_format($recipeQuantity->calorie, $recipeQuantity->calorie == (int)$recipeQuantity->calorie ? 0 : 2)); ?> <?php if($recipeQuantity->calorie > 1): ?> calories <?php else: ?> calorie <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    

        <div class="row gy-3 mb-5">
            <h3 class="text-center fw-bold">Préparation</h3>

            <div class="row gy-3">
                <?php $__currentLoopData = $recipeSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeStep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-start">
                    <?php echo e($recipeStep->description); ?>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="row gy-3 mb-5">
            <h3 class="text-center fw-bold">Votre avis nous intéresse</h3>

            <div class="d-flex justify-content-center align-items-center gap-3" id="rating-bottom">
                <a href="<?php echo e(route('starCommentForm.show', ['recipeId' => $recipe->id])); ?>">
                    <span class="star-bottom fs-1" data-rating="1">&#9733;</span>
                </a>

                <a href="<?php echo e(route('starCommentForm.show', ['recipeId' => $recipe->id])); ?>">
                    <span class="star-bottom fs-1" data-rating="2">&#9733;</span>
                </a>

                <a href="<?php echo e(route('starCommentForm.show', ['recipeId' => $recipe->id])); ?>">
                    <span class="star-bottom fs-1" data-rating="3">&#9733;</span>
                </a>

                <a href="<?php echo e(route('starCommentForm.show', ['recipeId' => $recipe->id])); ?>">
                    <span class="star-bottom fs-1" data-rating="4">&#9733;</span>
                </a>

                <a href="<?php echo e(route('starCommentForm.show', ['recipeId' => $recipe->id])); ?>">
                    <span class="star-bottom fs-1" data-rating="5">&#9733;</span>
                </a>
            </div>
        </div>

        <div class="row gy-3 mb-5">
            <h3 class="text-center fw-bold">Commentaires</h3>

            <div class="row gy-3">
                <?php $__currentLoopData = $recipeStarscomments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeStarscomment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!is_null($recipeStarscomment->comment)): ?>
                <div class="d-flex justifiy-content-start align-items-start gap-3 mb-4">
                    <div class="d-flex justify-content-center align-items-center gap-3" id="rating-bottom">
                        <img src="<?php echo e(asset($recipeStarscomment->avatar ?? 'uploads/avatars/default_avatar.png')); ?>" width="50" height="50" class="object-fit-cover img-thumbnail rounded-circle">
                    </div>


                    <div class="row ">
                        <div class="fw-bold">
                            <?php echo e($recipeStarscomment->username); ?>

                        </div>

                        <div class="d-flex justify-content-start align-items-center gap-1" id="rating-comment">
                            <span class="star-comment fs-4 <?php echo e($recipeStarscomment->stars === '1' ? 'good' : ''); ?>" data-rating="1">&#9733;</span>
                            <span class="star-comment fs-4 <?php echo e($recipeStarscomment->stars === '2' ? 'good' : ''); ?>" data-rating="2">&#9733;</span>
                            <span class="star-comment fs-4 <?php echo e($recipeStarscomment->stars === '3' ? 'good' : ''); ?>" data-rating="3">&#9733;</span>
                            <span class="star-comment fs-4 <?php echo e($recipeStarscomment->stars === '4' ? 'good' : ''); ?>" data-rating="4">&#9733;</span>
                            <span class="star-comment fs-4 <?php echo e($recipeStarscomment->stars === '5' ? 'good' : ''); ?>" data-rating="5">&#9733;</span>
                        </div>

                        <div>
                            <?php echo e($recipeStarscomment->comment); ?>

                        </div>

                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<script>
   function updateQuantities() {
    var newPersonCount = parseInt(document.getElementById('recipeFor').innerText);
    var initialPersonCount = parseInt(document.getElementById('recipeFor').getAttribute('data-initial'));
    var factor = newPersonCount / initialPersonCount;

    var quantities = document.querySelectorAll('.ingredient-quantity');

    quantities.forEach(function(quantityElement) {
        var initialQuantity = parseFloat(quantityElement.getAttribute('data-initial'));
        var unit = quantityElement.getAttribute('data-unit');
        var newQuantity = initialQuantity * factor;
        quantityElement.innerText = newQuantity.toFixed(2) + ' ' + unit; // Ajout de l'unité
    });
}

    function increment() {
        var currentValue = parseInt(document.getElementById('recipeFor').innerText);
        document.getElementById('recipeFor').innerText = currentValue + 1;
        updateQuantities();
    }

    function decrement() {
        var currentValue = parseInt(document.getElementById('recipeFor').innerText);
        if (currentValue > 1) {
            document.getElementById('recipeFor').innerText = currentValue - 1;
            updateQuantities();
        }
    }

    // Appel initial pour mettre à jour les quantités au chargement de la page
    window.onload = function() {
        updateQuantities();
    };
</script>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/jawaad/resources/views/recipes/recipe.blade.php ENDPATH**/ ?>