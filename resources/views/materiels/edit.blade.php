@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Matériel</h2>
    <form action="{{ route('materiels.update', $materiel->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Cela indique que c'est une requête PUT pour la mise à jour -->
        
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $materiel->type) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" name="marque" class="form-control" value="{{ old('marque', $materiel->marque) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" name="modele" class="form-control" value="{{ old('modele', $materiel->modele) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="systeme_exploitation" class="form-label">Système d'exploitation</label>
            <input type="text" name="systeme_exploitation" class="form-control" value="{{ old('systeme_exploitation', $materiel->systeme_exploitation) }}">
        </div>
        
        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" class="form-control" value="{{ old('quantite', $materiel->quantite) }}" min="1" required>
        </div>
        
        <div class="mb-3">
            <label for="date_achat" class="form-label">Date d'achat</label>
            <input type="date" name="date_achat" class="form-control" value="{{ old('date_achat', $materiel->date_achat) }}">
        </div>
        
        <div class="mb-3">
            <label for="observations" class="form-label">Observations</label>
            <textarea name="observations" class="form-control">{{ old('observations', $materiel->observations) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
