@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Matériel</h2>
    <form action="{{ route('materiels.store') }}" method="POST">
        @csrf
        <label for="matricule" class="form-label">matricule</label>
        <input type="text" name="matricule" class="form-control" required>
        <div class="mb-3">
            <label for="type" class="form-label">Type de matériel</label>
            <select name="type" class="form-select" required>
                <option value="">Sélectionner un type</option>
                <option value="Ordinateur">Ordinateur</option>
                <option value="Serveur">Serveur</option>
                <option value="Imprimante">Imprimante</option>
            </select>
        </div>
            <label for="marque" class="form-label">Marque</label>
            <input type="text" name="marque" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" name="modele" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="systeme_exploitation" class="form-label">Système d'exploitation</label>
            <input type="text" name="systeme_exploitation" class="form-control">
        </div>
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label for="date_achat" class="form-label">Date d'achat</label>
            <input type="date" name="date_achat" class="form-control">
        </div>
        <div class="mb-3">
            <label for="observations" class="form-label">Observations</label>
            <textarea name="observations" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
