@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Liste des Agents et leurs Matériels</h2>

    <!-- Barre de recherche -->
    <form method="GET" action="{{ route('affectations.agentsMateriels') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-4">
                <select name="filter" class="form-select" required>
                    <option value="nom_complet" {{ request('filter') == 'nom_complet' ? 'selected' : '' }}>Nom Complet</option>
                    <option value="cin" {{ request('filter') == 'cin' ? 'selected' : '' }}>CIN</option>
                    <option value="departement" {{ request('filter') == 'departement' ? 'selected' : '' }}>Département</option>
                    <option value="division" {{ request('filter') == 'division' ? 'selected' : '' }}>Division</option>
                    <option value="service" {{ request('filter') == 'service' ? 'selected' : '' }}>Service</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Rechercher..." value="{{ request('search') }}" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Rechercher</button>
            </div>
        </div>
    </form>

    <!-- Résultats -->
    @forelse($agents as $agent)
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">{{ $agent->nom_complet }}</h4>
                <p><strong>CIN:</strong> {{ $agent->cin }}</p>
                <p><strong>Département:</strong> {{ $agent->departement }}</p>

                @if($agent->materiels->isEmpty())
                    <p class="text-muted">Aucun matériel affecté.</p>
                @else
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Matricule</th>
                                <th>Type</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agent->materiels as $materiel)
                                <tr>
                                    <td>{{ $materiel->matricule }}</td>
                                    <td>{{ $materiel->type }}</td>
                                    <td>{{ $materiel->marque }}</td>
                                    <td>{{ $materiel->modele }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    @empty
        <p class="text-center text-danger">Aucun agent trouvé.</p>
    @endforelse
</div>
@endsection
