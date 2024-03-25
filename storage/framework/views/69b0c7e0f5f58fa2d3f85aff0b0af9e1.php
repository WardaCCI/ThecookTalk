<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column gap-4 align-items-center mb-5">

    <h1 class="text-center fw-bold">Laissez un avis</h1>

    <!-- recipe form -->
    <form method="POST" action="<?php echo e(route('starComment.post', ['recipeId' => $recipeId])); ?>" class="col-md-7">
        <?php echo csrf_field(); ?>

        <div class="mb-5 d-flex flex-column gap-3">

            <?php if(session('star_comment_warning')): ?>
            <div class="alert alert-warning">
                <?php echo e(session('star_comment_warning')); ?> &#9785;
            </div>
            <?php endif; ?>

            <?php if(session('star_comment_success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('star_comment_success')); ?> &#128578;
            </div>
            <?php endif; ?>

            <?php if(session('star_comment_info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('star_comment_info')); ?> &#128578;
            </div>
            <?php endif; ?>

            <!-- stars -->
            <div class="my-2">
                <fieldset class="star-rating">
                    <input checked name="rating" value="0" type="radio" id="rating0">
                    <label for="rating0">
                        <span class="hide-visually">0 Stars</span>
                    </label>

                    <input name="rating" value="1" type="radio" id="rating1">
                    <label for="rating1">
                        <span class="hide-visually">1 Star</span>
                        <span aria-hidden="true" class="star">★</span>
                    </label>

                    <input name="rating" value="2" type="radio" id="rating2">
                    <label for="rating2">
                        <span class="hide-visually">2 Stars</span>
                        <span aria-hidden="true" class="star">★</span>
                    </label>

                    <input name="rating" value="3" type="radio" id="rating3">
                    <label for="rating3">
                        <span class="hide-visually">3 Stars</span>
                        <span aria-hidden="true" class="star">★</span>
                    </label>

                    <input name="rating" value="4" type="radio" id="rating4">
                    <label for="rating4">
                        <span class="hide-visually">4 Stars</span>
                        <span aria-hidden="true" class="star">★</span>
                    </label>

                    <input name="rating" value="5" type="radio" id="rating5">
                    <label for="rating5">
                        <span class="hide-visually">5 Stars</span>
                        <span aria-hidden="true" class="star">★</span>
                    </label>
                </fieldset>
            </div>

            <!-- comment -->
            <div class="">
                <textarea type="text" name="comment" placeholder="Laissez un commentaire" aria-describedby="comment_feedback" class="my-2 form-control shadow-none <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>

                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div id="comment_feedback" class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <div class="d-flex justify-content-center alig-items-center gap-2">
                <a class="fw-bold btn btn-secondary" href="<?php echo e(route('recipe.show', ['recipeId' => $recipeId])); ?>" role="button">
                    Retour
                </a>

                <button type="submit" class="fw-bold btn btn-success rounded">
                    Valider
                </button>
            </div>
        </div>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/jawaad/resources/views/stars_comments/star_comment_form.blade.php ENDPATH**/ ?>