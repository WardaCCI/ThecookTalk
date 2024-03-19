<!-- resources/views/recettes/delete.blade.php -->
<link rel="stylesheet" href="{{ asset('public\css\styles.css') }}">
<h1>Supprimer la recette</h1>
<p>Êtes-vous sûr de vouloir supprimer la recette "{{ $recette->titre }}" ?</p>
<form action="{{ route('recettes.destroy', $recette->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Confirmer la suppression</button>
</form>
