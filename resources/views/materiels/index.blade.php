@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Matériels</h2>
    <a href="{{ route('materiels.create') }}" class="btn btn-primary">Ajouter Matériel</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>matricule</th>
                <th>Type</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Quantité</th>
                <th>Date d'achat</th>
                <th>Observations</th>
                <th> Actions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiels as $materiel)
            <tr>
            <td>{{ $materiel->matricule }}</td>
                <td>{{ $materiel->id }}</td>
                <td>{{ $materiel->type }}</td>
                <td>{{ $materiel->marque }}</td>
                <td>{{ $materiel->modele }}</td>
                <td>{{ $materiel->quantite }}</td>
                <td>{{ $materiel->date_achat ?? 'Non spécifiée' }}</td>
                <td>{{ $materiel->observations }}</td>
                <td>
                <td>
    <a href="{{ route('materiels.edit', $materiel) }}">Modifier</a>
    <form action="{{ route('materiels.destroy', $materiel) }}" method="POST" style="display:inline;">
    <a href="{{ route('materiels.show', $materiel->id) }}">Voir Détails</a>
 
    @csrf @method('DELETE')
        <button type="submit" onclick="return confirm('Supprimer ce matériel ?')">Supprimer</button>
    </form>
</td>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
