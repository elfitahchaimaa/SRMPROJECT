@extends('layouts.app')

@section('title', 'Modifier un Agent')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <i class="bi bi-person-gear fs-4 me-2"></i>
                <h4 class="mb-0">Modifier un Agent</h4>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('agents.update', $agent->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="nom_complet" class="form-label fw-bold">
                                    <i class="bi bi-person me-1"></i> Nom Complet
                                </label>
                                <input type="text" class="form-control @error('nom_complet') is-invalid @enderror" 
                                       id="nom_complet" name="nom_complet" value="{{ old('nom_complet', $agent->nom_complet) }}" 
                                       placeholder="Entrez le nom complet" required>
                                @error('nom_complet')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="cin" class="form-label fw-bold">
                                    <i class="bi bi-card-text me-1"></i> CIN
                                </label>
                                <input type="text" class="form-control @error('cin') is-invalid @enderror" 
                                       id="cin" name="cin" value="{{ old('cin', $agent->cin) }}" 
                                       placeholder="Ex: AB123456" required>
                                @error('cin')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="departement" class="form-label fw-bold">
                                    <i class="bi bi-building me-1"></i> Département
                                </label>
                                <select class="form-select @error('departement') is-invalid @enderror" 
                                        name="departement" id="departement" required>
                                    <option value="">Sélectionner un département</option>
                                    @foreach($departements as $dep => $divs)
                                        <option value="{{ $dep }}" {{ old('departement', $agent->departement) == $dep ? 'selected' : '' }}>
                                            {{ $dep }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="division" class="form-label fw-bold">
                                    <i class="bi bi-diagram-3 me-1"></i> Division
                                </label>
                                <select class="form-select @error('division') is-invalid @enderror" 
                                        name="division" id="division" required>
                                    <option value="">Sélectionner une division</option>
                                    @foreach($departements[$agent->departement] ?? [] as $div)
                                        <option value="{{ $div }}" {{ old('division', $agent->division) == $div ? 'selected' : '' }}>
                                            {{ $div }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('division')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="service" class="form-label fw-bold">
                                    <i class="bi bi-gear me-1"></i> Service
                                </label>
                                <input type="text" class="form-control @error('service') is-invalid @enderror" 
                                       id="service" name="service" value="{{ old('service', $agent->service) }}" 
                                       placeholder="Entrez le service" required>
                                @error('service')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="site" class="form-label fw-bold">
                                    <i class="bi bi-geo-alt me-1"></i> Site
                                </label>
                                <input type="text" class="form-control @error('site') is-invalid @enderror" 
                                       id="site" name="site" value="{{ old('site', $agent->site) }}" 
                                       placeholder="Emplacement du site" required>
                                @error('site')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <div>
                            <a href="{{ route('agents.index') }}" class="btn btn-secondary me-2">
                                <i class="bi bi-arrow-left me-1"></i> Retour à la liste
                            </a>
                            <a href="{{ route('agents.create') }}" class="btn btn-success">
                                <i class="bi bi-person-plus me-1"></i> Ajouter un Agent
                            </a>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const departements = @json($departements);

    document.getElementById('departement').addEventListener('change', function() {
        let divisionSelect = document.getElementById('division');
        divisionSelect.innerHTML = '<option value="">Sélectionner une division</option>';

        if (this.value in departements) {
            departements[this.value].forEach(function(div) {
                let option = document.createElement('option');
                option.value = div;
                option.textContent = div;
                
                // Conserver la sélection si on revient sur la même division
                if (this.value === "{{ old('departement', $agent->departement) }}" && 
                    div === "{{ old('division', $agent->division) }}") {
                    option.selected = true;
                }
                
                divisionSelect.appendChild(option);
            });
        }
    });
    
    // Assurer que le script s'exécute après le chargement complet du DOM
    document.addEventListener('DOMContentLoaded', function() {
        // Si le département est déjà sélectionné, nous voulons nous assurer que les divisions sont chargées
        const departementSelect = document.getElementById('departement');
        // Simuler un changement pour initialiser la liste des divisions si nécessaire
        if (departementSelect.value) {
            departementSelect.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection