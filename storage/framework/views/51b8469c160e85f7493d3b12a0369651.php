<?php $__env->startSection('content'); ?>

<div class="comment-section" >
    
    <h2>Votre note est prise en compte. Vous pouvez laisser un commentaire :</h2>

    <!-- Formulaire de commentaire -->
    <form action="<?php echo e(route('comment.store', $recipeId)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <textarea id="comment" name="comment" placeholder="Tapez votre commentaire" rows="15"cols="100" ></textarea><br>
        <div class="comment-button" >
        <button type="submit" >Envoyer</button>
    </form>
    
    <form action="<?php echo e(route('recipe.show', $recipeId)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button type="submit">Retour</button>
    </form>
        </div>
   
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/projet recette/resources/views/recipeView/comment.blade.php ENDPATH**/ ?>