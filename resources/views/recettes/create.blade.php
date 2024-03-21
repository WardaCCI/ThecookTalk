@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Inclure d'autres feuilles de style -->
<link rel="stylesheet" href="{{ asset('css/styleCreate.css') }}">

<div class="container">
    <h1 class="text-center" id="title">Créer une nouvelle recette</h1>
    <form action="{{ route('recettes.store') }}" method="post" enctype="multipart/form-data">
        @csrf <!-- Ajout de la directive csrf -->
        <div class="mb-3">
            <label for="recipe_name" class="form-label">Nom de la recette:</label>
            <input type="text" class="form-control" id="recipe_name" name="recipe_name" required>
        </div>

        <!-- Catégorie de recette et Difficulté -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="recipe_category" class="form-label">Catégorie de recette:</label>
            <select class="form-select" id="recipe_category" name="recipe_category" required>
                <option value="plat">Plat</option>
                <option value="entree">Entrée</option>
                <option value="dessert">Dessert</option>
                <option value="boisson">Boisson</option>
                <option value="snack">Snack</option>
                <!-- Ajoutez d'autres options si nécessaire -->
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulté:</label>
            <select class="form-select" id="difficulty" name="difficulty" required>
                <option value="facile">Facile</option>
                <option value="moyen">Moyenne</option>
                <option value="difficile">Difficile</option>
            </select>
        </div>
    </div>
</div>
<!-- Temps de préparation et Temps de cuisson -->
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="preparation_time" class="form-label">Temps de préparation (hh:mm):</label>
            <input type="time" class="form-control" id="preparation_time" name="preparation_time" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="cooking_time" class="form-label">Temps de cuisson (hh:mm):</label>
            <input type="time" class="form-control" id="cooking_time" name="cooking_time" required>
        </div>
    </div>
</div>

<!-- Type de cuisson -->
<div class="mb-3">
    <label for="cooking_type" class="form-label">Type de cuisson :</label>
    <select class="form-select" id="cooking_type" name="cooking_type" required>
        <option value="four">Four</option>
        <option value="micro-onde">Micro-onde</option>
        <option value="poele">Poêle</option>
        <option value="sans_cuisson">Sans cuisson</option>
        <option value="bain_marie">Bain-marie</option>
        <option value="barbecue">Barbecue</option>
        <option value="grill">Grill</option>
        <!-- Ajoutez d'autres options si nécessaire -->
    </select>
</div>

        <!-- Ingrédients -->
        <h2>Ingrédients</h2>
        <div id="ingredients" class="mb-3">
            <ol id="ingredient-list" class="list-group">
                <!-- Liste des ingrédients -->
            </ol>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" name="ingredient" id="ingredient_name" placeholder="Nom de l'ingrédient">
                </div>
                <div class="col">
                    <input type="number" class="form-control" name="ingredient" id="ingredient_quantity" placeholder="Quantité">
                </div>
                <div class="col">
                    <select class="form-select" name="ingredient_unit" id="ingredient_unit">
                        <option value="grams">Grammes</option>
                        <option value="liters">Litres</option>
                        <option value="pieces">Pièces</option>
                        <option value="cups">Tasses</option>
                        <option value="teaspoons">Cuillères à café</option>
                        <option value="tablespoons">Cuillères à soupe</option>
                        <option value="milliliters">Millilitres</</option>                    
                    </select>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success" id="add-ingredient">Ajouter</button>
                </div>
            </div>
        </div>
        
        <!-- Étapes -->
        <h2>Étapes</h2>
        <div id="steps" class="mb-3">
            <ul id="step-list" class="list-group">
                <!-- Liste des étapes -->
            </ul>
            <div class="mb-3">
                <input type="text" class="form-control" name="step" id="step_description" placeholder="Description de l'étape" required>
            </div>
            <div class="mb-3">
                <button type="button" id="add-step" class="btn btn-success">Ajouter étape</button> <!-- Bouton pour ajouter une étape -->
            </div>
        </div>    

       <!-- Images -->
<h2>Images</h2>
<div id="images" class="mb-3">
    <div class="mb-3">
        <input type="file" class="form-control" id="image" name="image[]" accept="image/*" multiple required>
    </div>
    <div id="image-list" class="row">
        <!-- Liste des images ajoutées -->
    </div>
</div>
        <div>
            <button type="submit" class="btn btn-success">Enregistrer la recette</button>
        </div>

        <script>
        // Modifier la fonction addStepToList pour ajouter un bouton de suppression
function addStepToList() {
    const stepDescription = document.getElementById('step_description').value;
    if (stepDescription.trim() !== '') {
        const stepList = document.getElementById('step-list');
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.textContent = stepDescription;
        
        // Ajouter un bouton de suppression à côté de l'élément ajouté
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'X';
        deleteButton.className = 'btn btn-danger btn-sm';
        deleteButton.addEventListener('click', function() {
            listItem.remove(); // Supprimer l'élément lorsque le bouton est cliqué
        });
        
        listItem.appendChild(deleteButton); // Ajouter le bouton de suppression à l'élément de liste
        stepList.appendChild(listItem);
        
        document.getElementById('step_description').value = '';
    } else {
        alert('Veuillez entrer une description pour l\'étape.');
    }
}


// Modifier la fonction addIngredientToList pour ajouter un bouton de suppression
function addIngredientToList() {
    const ingredientName = document.getElementById('ingredient_name').value;
    const ingredientQuantity = document.getElementById('ingredient_quantity').value;
    const ingredientUnitSelect = document.getElementById('ingredient_unit');
    const ingredientUnit = ingredientUnitSelect.options[ingredientUnitSelect.selectedIndex].text;

    if (ingredientName.trim() !== '' && ingredientQuantity.trim() !== '') {
        const ingredientList = document.getElementById('ingredient-list');
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';
        listItem.textContent = ingredientName + ' - ' + ingredientQuantity + ' ' + ingredientUnit;
        
        // Ajouter un bouton de suppression à côté de l'élément ajouté
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'X';
        deleteButton.className = 'btn btn-danger btn-sm';
        deleteButton.addEventListener('click', function() {
            listItem.remove(); // Supprimer l'élément lorsque le bouton est cliqué
        });
        
        listItem.appendChild(deleteButton); // Ajouter le bouton de suppression à l'élément de liste
        ingredientList.appendChild(listItem);
        
        document.getElementById('ingredient_name').value = '';
        document.getElementById('ingredient_quantity').value = '';
        document.getElementById('ingredient_unit').value = '';
    } else {
        alert('Veuillez remplir tous les champs pour ajouter un ingrédient.');
    }
}

function addImageToList(event) {
    const fileList = event.target.files; // Récupérer la liste des fichiers sélectionnés
    const imageList = document.getElementById('image-list');

    // Parcourir chaque fichier sélectionné
    for (let i = 0; i < fileList.length; i++) {
        const file = fileList[i];
        
        // Vérifier si le fichier est une image
        if (file.type.match('image.*')) {
            // Créer une colonne Bootstrap pour chaque image
            const column = document.createElement('div');
            column.className = 'col-4'; // Utilisez Bootstrap pour diviser en 3 colonnes
            const imageItem = document.createElement('img');
            imageItem.src = URL.createObjectURL(file); // Définir la source de l'image en utilisant l'URL du fichier
            imageItem.className = 'img-fluid mb-3'; // Classe Bootstrap pour rendre l'image responsive et ajouter un espace en bas
            column.appendChild(imageItem); // Ajouter l'image à la colonne
            
            // Ajouter un bouton de suppression à côté de l'image
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'X';
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.addEventListener('click', function() {
                column.remove(); // Supprimer la colonne contenant l'image et le bouton lorsque le bouton est cliqué
            });
            
            column.appendChild(deleteButton); // Ajouter le bouton de suppression à côté de l'image
            imageList.appendChild(column); // Ajouter la colonne à la liste d'images
        } else {
            alert('Veuillez sélectionner uniquement des fichiers image.');
        }
    }
}




// Écouteur d'événement pour le bouton "Ajouter étape"
document.getElementById('add-step').addEventListener('click', addStepToList);

// Écouteur d'événement pour le bouton "Ajouter ingrédient"
document.getElementById('add-ingredient').addEventListener('click', addIngredientToList);

// Écouteur d'événement pour détecter les changements dans l'élément input de fichier
document.getElementById('image').addEventListener('change', addImageToList);
</script>

    </form>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/create_recipe.js') }}"></script>
@endsection

