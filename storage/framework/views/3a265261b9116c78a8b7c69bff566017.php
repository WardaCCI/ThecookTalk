<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column gap-3 justify-content-center">
    <div class="fs-1 fw-bold">Validation d'email</div>

    <div>
        Votre demande de création de compte a été bien prise en compte.
    </div>

    <div>
        Il ne vous reste plus qu'à vérifier votre email pour pouvoir vous connecter.
    </div>

    <div>
        Si vous n'avez pas reçu le mail de validation, cliquez sur le button ci-dessous pour le recevoir à nouveau.
    </div>

    <form method="POST" action="<?php echo e(route('verify.post', ['userId' => $userId])); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="fw-bold btn btn-primary">
            Renvoyer le mail
        </button>
    </form>

    <div>
        L'équipe <span class="fw-bold">The Cook Talk</span> !
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/jawaad/resources/views/auth/signup_email_verify.blade.php ENDPATH**/ ?>