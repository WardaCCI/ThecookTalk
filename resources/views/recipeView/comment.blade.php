@extends('users.base')

@section('content')

<div class="comment-section" >
    
    <h2>Votre note est prise en compte. Vous pouvez laisser un commentaire :</h2>

    <!-- Formulaire de commentaire -->
    <form action="{{ route('comment.store', $recipeId) }}" method="post">
        @csrf
        <textarea id="comment" name="comment" placeholder="Tapez votre commentaire" rows="15"cols="100" ></textarea><br>
        <div class="comment-button" >
        <button type="submit" >Envoyer</button>
    </form>
    
    <form action="{{ route('recipe.show', $recipeId) }}" method="post">
        @csrf
        <button type="submit">Retour</button>
    </form>
        </div>
   
</div>

@endsection