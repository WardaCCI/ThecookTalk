<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="d-flex flex-column align-items-center">

        <h1 class="fw-bold text-center py-4">Ouverture de session</h1>

        <form method="POST" action="<?php echo e(route('signin.post')); ?>" class="col-sm-4">
            <?php echo csrf_field(); ?>

            <?php if(session('warning')): ?>
            <div class="alert alert-warning">
                <?php echo e(session('warning')); ?> &#9785;
            </div>
            <?php endif; ?>

            <div class="my-2">
                <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="email" aria-describedby="email_feedback" class="py-3 form-control shadow-none <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div id="email_feedback" class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="my-2 d-flex flex-column">
                <a href="/signin/forgot-password" class="align-self-end link-underline link-underline-opacity-0">Mot de passe oublié ?</a>
                <input type="password" id="password" name="password" placeholder="mot de passe" aria-describedby="password_feedback" class="py-3 form-control shadow-none <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div id="password_feedback" class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="d-grid">
                <button type="submit" class="fw-bold btn btn-primary shadow-none py-3 my-2">Se connecter</button>
            </div>

        </form>

        <div class="col-sm-4 d-flex flex-column align-items-center">
            <span>Vous n'avez pas encore un compte ?</span>
            <a href="/signup" class="link-underline link-underline-opacity-0">C'est par ici pour en créer un !</a>
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/jawaad/resources/views/auth/signin.blade.php ENDPATH**/ ?>