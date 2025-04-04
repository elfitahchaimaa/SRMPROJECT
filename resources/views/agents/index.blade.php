@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="card shadow-lg">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h2 class="mb-0 fs-4 fw-bold"><i class="bi bi-people-fill me-2"></i>Liste des Agents</h2>
            <a href="{{ route('agents.create') }}" class="btn btn-light btn-sm d-flex align-items-center">
                <i class="bi bi-person-plus-fill me-1"></i>Ajouter un agent
            </a>
        </div>
        
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover border-bottom">
                    <thead>
                        <tr class="bg-light">
                            <th class="fw-bold border-0">Nom Complet</th>
                            <th class="fw-bold border-0">CIN</th>
                            <th class="fw-bold border-0">Département</th>
                            <th class="fw-bold border-0">Division</th>
                            <th class="fw-bold border-0">Service</th>
                            <th class="fw-bold border-0">Site</th>
                            <th class="text-center fw-bold border-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                        <tr>
                            <td class="align-middle">{{ $agent->nom_complet }}</td>
                            <td class="align-middle">{{ $agent->cin }}</td>
                            <td class="align-middle">{{ $agent->departement }}</td>
                            <td class="align-middle">{{ $agent->division }}</td>
                            <td class="align-middle">{{ $agent->service }}</td>
                            <td class="align-middle">{{ $agent->site }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('agents.edit', $agent) }}" class="btn btn-outline-primary btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </a>
                                    <form action="{{ route('agents.destroy', $agent) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet agent?')">
                                            <i class="bi bi-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    /* Variables */
    :root {
        --primary-color: #0d6efd;
        --primary-hover: #0b5ed7;
        --light-bg: #f8f9fa;
        --border-radius: 8px;
        --box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        --transition-speed: 0.25s;
    }
    
    /* Card styling */
    .card {
        border-radius: var(--border-radius);
        border: none;
        overflow: hidden;
        transition: transform var(--transition-speed), box-shadow var(--transition-speed);
    }
    
    .card:hover {
        box-shadow: var(--box-shadow);
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        padding: 1rem 1.5rem;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #0d6efd, #3d8bfd);
    }
    
    /* Button styling */
    .btn {
        border-radius: var(--border-radius);
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all var(--transition-speed);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
    }
    
    .btn-sm {
        padding: 0.4rem 0.8rem;
        font-size: 0.875rem;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .btn:active {
        transform: translateY(0);
    }
    
    .btn-outline-primary {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }
    
    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: white;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    
    /* Table styling */
    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0;
    }
    
    .table th {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 0.75rem 1rem;
        color: #495057;
    }
    
    .table td {
        padding: 1rem;
        vertical-align: middle;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    /* Row styling */
    tbody tr {
        transition: all var(--transition-speed);
    }
    
    tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.04) !important;
    }
    
    /* Alert styling */
    .alert {
        border-radius: var(--border-radius);
        padding: 1rem 1.25rem;
    }
    
    .alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
    }
    
    /* Responsive improvements */
    @media (max-width: 768px) {
        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .card-header a {
            margin-top: 1rem;
        }
        
        .btn-group {
            display: flex;
            flex-direction: column;
        }
        
        .btn-group .btn {
            margin-bottom: 0.5rem;
            margin-right: 0 !important;
        }
    }
    
    /* Add nice font if available */
    body {
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }
</style>
@endsection