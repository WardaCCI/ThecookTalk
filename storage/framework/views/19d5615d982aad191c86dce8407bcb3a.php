<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column gap-4 align-items-center mb-5">

    <h1 class="fw-bold text-center py-4">Mise à jour de la recette</h1>

    <!-- recipe form -->
    <form method="POST" action="<?php echo e(route('recipe.update', ['userId' => $userId, 'recipeId' => $recipe->id])); ?>" class="container col-md-7">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="d-flex flex-column">
            <!-- header -->
            <div class="d-flex justify-content-between py-3 border-bottom mb-3">
                <div class="fw-bold fs-6 align-self-center">
                    Recette
                </div>
            </div>

            <span class="text-center align-self-center mb-3">
                &#9888; Dans les 2 derniers champs dites si c'est une recette pour N Personne.s ou pour une Boisson de N Litre.s
            </span>

            <!-- notifications -->
            <?php if(session('recipe_warning')): ?>
            <div class="alert alert-warning">
                <?php echo e(session('recipe_warning')); ?> &#9785;
            </div>
            <?php endif; ?>

            <?php if(session('recipe_success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('recipe_success')); ?> &#128578;
            </div>
            <?php endif; ?>

            <?php if(session('recipe_info')): ?>
            <div class="alert alert-info">
                <?php echo e(session('recipe_info')); ?> &#128578;
            </div>
            <?php endif; ?>

            <!-- recipe name -->
            <div class="my-2">
                <input type="text" name="recipename" placeholder="Nom de la recette..." value="<?php echo e($recipe->recipename); ?>" aria-describedby="recipename_feedback" class="form-control shadow-none <?php $__errorArgs = ['recipename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(session('recipe_submitted')): ?> disabled <?php endif; ?>>

                <?php $__errorArgs = ['recipename'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div id="recipename_feedback" class="invalid-feedback">
                    <?php echo e($message); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- category, difficulty, time and cooking type -->
            <div class="row row-cols-md-2 gy-2 gx-2 mb-2">

                <!-- category -->
                <div class="">
                    <select name="category" aria-describedby="category_feedback" class="form-select form-control shadow-none <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(session('recipe_submitted')): ?> disabled <?php endif; ?>>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="Entrée" <?php if( $recipe->category === 'Entrée' ): ?> selected <?php endif; ?>>Entrée</option>
                        <option value="Plat" <?php if( $recipe->category === 'Plat' ): ?> selected <?php endif; ?>>Plat</option>
                        <option value="Dessert" <?php if( $recipe->category === 'Dessert' ): ?> selected <?php endif; ?>>Dessert</option>
                        <option value="Boisson" <?php if( $recipe->category === 'Boisson' ): ?> selected <?php endif; ?>>Boisson</option>
                    </select>

                    <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="category_feedback" class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- difficulty -->
                <div class="">
                    <select name="difficulty" aria-describedby="difficulty_feedback" class="form-select form-control shadow-none <?php $__errorArgs = ['difficulty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(session('recipe_submitted')): ?> disabled <?php endif; ?>>
                        <option value="">Sélectionnez la difficulté</option>
                        <option value="Facile" <?php if( $recipe->difficulty === 'Facile' ): ?> selected <?php endif; ?>>Facile</option>
                        <option value="Moyen" <?php if( $recipe->difficulty === 'Moyen' ): ?> selected <?php endif; ?>>Moyen</option>
                        <option value="Difficile" <?php if( $recipe->difficulty ==='Difficile' ): ?> selected <?php endif; ?>>Difficile</option>
                    </select>

                    <?php $__errorArgs = ['difficulty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="difficulty_feedback" class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- time -->
                <div class="">
                    <input type="text" name="time" pattern="[01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]" value="<?php echo e($recipe->time); ?>" placeholder="Temps de préparation (Format: 'HH:MM:SS')" aria-describedby="time_feedback" class="form-control shadow-none <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(session('recipe_submitted')): ?> disabled <?php endif; ?>>

                    <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="time_feedback" class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- cooking type -->
                <div class="">
                    <select name="cookingtype" aria-describedby="cookingtype_feedback" class="form-select form-control shadow-none <?php $__errorArgs = ['cookingtype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php if(session('recipe_submitted')): ?> disabled <?php endif; ?>>
                        <option value="">Sélectionnez un type</option>
                        <option value="Four" <?php if( $recipe->cookingtype === 'Four' ): ?> selected <?php endif; ?>>Four</option>
                        <option value="Barbecue" <?php if( $recipe->cookingtype === 'Barbecue' ): ?> selected <?php endif; ?>>Barbecue</option>
                        <option value="Poele" <?php if( $recipe->cookingtype === 'Poele' ): ?> selected <?php endif; ?>>Poele</option>
                        <option value="Vapeur" <?php if( $recipe->cookingtype === 'Vapeur' ): ?> selected <?php endif; ?>>Vapeur</option>
                        <option value="Sans cuisson" <?php if( $recipe->cookingtype === 'Sans cuisson' ): ?> selected <?php endif; ?>>Sans cuisson</option>
                    </select>

                    <?php $__errorArgs = ['cookingtype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="cookingtype_feedback" class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- for -->
                <div class="my-2">
                    <input type="number" name="for" value="<?php echo e($recipe->for); ?>" placeholder="10" aria-describedby="for_feedback" class="col form-control shadow-none <?php $__errorArgs = ['for'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                </div>

                <!-- recipe unitname -->
                <div class="my-2">
                    <input list="units" name="id_unit" value="<?php echo e($recipeUnitname); ?>" placeholder="Saisissez une unité" aria-describedby="id_unit_feedback" class="col form-control shadow-none <?php $__errorArgs = ['id_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <datalist id="units">
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option>
                            <?php echo e($unit->unitname); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
                </div>
            </div>

            <button type="submit" class="fw-bold btn btn-success rounded-pill my-2 align-self-center">
                Valider
            </button>
        </div>
    </form>

    <!-- ingredients quantities and units form -->
    <div class="container col-md-7">
        <div class="mb-5">

            <!-- header -->
            <div class="d-flex justify-content-between py-3 border-bottom mb-3">
                <div class="fw-bold fs-6 align-self-center">
                    Ingrédients
                </div>
            </div>


            <form method="POST" action="<?php echo e(route('quantity.post', ['userId' => $userId, 'recipeId' => $recipe->id])); ?>" class="mb-3">
                <?php echo csrf_field(); ?>

                <div class="d-flex flex-column">

                    <?php if(session('quantity_warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('quantity_warning')); ?> &#9785;
                    </div>
                    <?php endif; ?>

                    <?php if(session('quantity_success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('quantity_success')); ?> &#128578;
                    </div>
                    <?php endif; ?>

                    <?php if(session('quantity_info')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('quantity_info')); ?> &#128578;
                    </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center gap-2 my-2">
                        <div class="d-flex flex-column flex-grow-1">
                            <input list="ingredients" name="ingredientname" value="<?php echo e(old('ingredientname')); ?>" placeholder="Saisissez un ingrédient" aria-describedby="ingredientname_feedback" class="col form-control shadow-none <?php $__errorArgs = ['ingredientname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <datalist id="ingredients">
                                <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option>
                                    <?php echo e($ingredient->ingredientname); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                        </div>

                        <div class="d-flex flex-column">
                            <input type="number" step="any" name="quantity" value="<?php echo e(old('quantity')); ?>" placeholder="100.00" aria-describedby="quantity_feedback" class="col form-control shadow-none <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        </div>

                        <div class="d-flex flex-column">
                            <input list="units" name="unitname" value="<?php echo e(old('unitname')); ?>" placeholder="Saisissez une unité" aria-describedby="unitname_feedback" class="col form-control shadow-none <?php $__errorArgs = ['unitname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <datalist id="units">
                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($unit->unitname != "Personne"): ?>
                                <option>
                                    <?php echo e($unit->unitname); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                        </div>
                    </div>

                    <button type="submit" class="fw-bold btn btn-success rounded-pill my-2 align-self-center">
                        Valider
                    </button>
                </div>
            </form>

            <div id="containerForIngredients">
                <?php $__currentLoopData = $recipeQuantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeQuantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex gap-2 mb-2">
                    <form method="POST" action="<?php echo e(route('quantity.update', ['userId' => $userId, 'recipeId' => $recipe->id, 'quantityId' => $recipeQuantity->id])); ?>" class="d-flex justify-content-center gap-2">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="">
                            <input list="ingredients" name="ingredientname_to_update" value="<?php echo e($recipeQuantity->ingredientname); ?>" placeholder="Saisissez un ingrédient" aria-describedby="ingredientname_to_update_feedback" class="col form-control shadow-none">
                            <datalist id="ingredients">
                                <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option>
                                    <?php echo e($ingredient->ingredientname); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                        </div>

                        <div class="">
                            <input type="number" step="any" name="quantity_to_update" value="<?php echo e($recipeQuantity->quantity); ?>" placeholder="100.00" aria-describedby="quantity_to_update_feedback" class="col form-control shadow-none">
                        </div>

                        <div class="">
                            <input list="units" name="unitname_to_update" value="<?php echo e($recipeQuantity->unitname); ?>" placeholder="Saisissez une unité" aria-describedby="unitname_to_update_feedback" class="col form-control shadow-none">
                            <datalist id="units">
                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($unit->unitname != "Personne"): ?>
                                <option>
                                    <?php echo e($unit->unitname); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </datalist>
                        </div>

                        <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                            <i class="bi bi-floppy-fill"></i>
                        </button>
                    </form>

                    <form method="POST" action="<?php echo e(route('quantity.delete', ['userId' => $userId, 'recipeId' => $recipe->id, 'quantityId' => $recipeQuantity->id])); ?>" class="d-grid">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- steps form-->
    <div class="container col-md-7">
        <div class="mb-5">

            <!-- header -->
            <div class="d-flex justify-content-between py-3 border-bottom mb-3">
                <div class="fw-bold fs-6 align-self-center">
                    Étapes
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('step.post', ['userId' => $userId, 'recipeId' => $recipe->id])); ?>" class="mb-3">
                <?php echo csrf_field(); ?>

                <div class="d-flex flex-column">
                    <!-- notifications -->
                    <?php if(session('step_warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('step_warning')); ?> &#9785;
                    </div>
                    <?php endif; ?>

                    <?php if(session('step_success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('step_success')); ?> &#128578;
                    </div>
                    <?php endif; ?>

                    <?php if(session('step_info')): ?>
                    <div class="alert alert-info">
                        <?php echo e(session('step_info')); ?> &#128578;
                    </div>
                    <?php endif; ?>

                    <?php $__errorArgs = ['description_to_update'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-warning">
                        <?php echo e($message); ?> &#9785;
                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <!-- textarea -->
                    <textarea type="text" name="description_to_add" placeholder="Entrez une description" aria-describedby="description_to_add_feedback" class="my-2 form-control shadow-none <?php $__errorArgs = ['description_to_add'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('description')); ?></textarea>

                    <?php $__errorArgs = ['description_to_add'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div id="description_to_add_feedback" class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <button type="submit" class="fw-bold btn btn-success rounded-pill my-2 align-self-center">
                        Valider
                    </button>
                </div>
            </form>

            <div id="containerForSteps">
                <?php $__currentLoopData = $recipeSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeStep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex gap-2 mb-2">
                    <form method="POST" action="<?php echo e(route('step.update', ['userId' => $userId, 'recipeId' => $recipe->id, 'stepId' => $recipeStep->id])); ?>" class="d-flex gap-2">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <textarea type="text" name="description_to_update" cols="110" aria-describedby="description_to_update_feedback" class="text-start form-control shadow-none"><?php echo e($recipeStep->description); ?></textarea>

                        <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                            <i class="bi bi-floppy-fill"></i>
                        </button>
                    </form>

                    <form method="POST" action="<?php echo e(route('step.delete', ['userId' => $userId, 'recipeId' => $recipe->id, 'stepId' => $recipeStep->id])); ?>" class="d-grid">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <!-- images form -->
    <div class="container col-md-7">
        <div class="mb-5">
            <div class="d-flex justify-content-between py-3 border-bottom mb-3">
                <div class="fw-bold fs-6 align-self-center">
                    Images
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('image.post', ['userId' => $userId, 'recipeId' => $recipe->id])); ?>" enctype="multipart/form-data" class="d-flex flex-column gap-2 mb-3">
                <?php echo csrf_field(); ?>

                <?php if(session('image_warning')): ?>
                <div class="alert alert-warning">
                    <?php echo e(session('image_warning')); ?> &#9785;
                </div>
                <?php endif; ?>

                <?php if(session('image_success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('image_success')); ?> &#128578;
                </div>
                <?php endif; ?>

                <?php if(session('image_info')): ?>
                <div class="alert alert-info">
                    <?php echo e(session('image_info')); ?> &#128578;
                </div>
                <?php endif; ?>

                <input type="file" name="images[]" accept="image/*" aria-describedby="images_feedback" class="my-2 form-control shadow-none <?php $__errorArgs = ['images_feedback'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>

                <button type="submit" class="fw-bold btn btn-success rounded-pill align-self-center">
                    Valider
                </button>
            </form>

            <div id="containerForImages" class="row gy-2 mb-3">
                <?php $__currentLoopData = $recipeImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipeImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between rounded">
                    <img src="<?php echo e(asset($recipeImage->image)); ?>" class="object-fit-cover" width="50" height="50" alt="image de recette">

                    <form method="POST" action="<?php echo e(route('image.delete', ['userId' => $userId, 'recipeId' => $recipe->id, 'imageId' => $recipeImage->id])); ?>" class="d-grid">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <a class="fw-bold btn btn-secondary" href="<?php echo e(route('dashboard.show', ['userId' => session()->get('user')['id']])); ?>" role="button">
        Retour
    </a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/baptiste/Desktop/jawaad/resources/views/recipes/recipe_update_form.blade.php ENDPATH**/ ?>