@extends('layouts.app') {{-- Adapte selon ton layout --}}

@section('content')
    <h1>Détails du Matériel</h1>
    <p><strong>Type:</strong> {{ $materiel->type }}</p>
    <p><strong>Marque:</strong> {{ $materiel->marque }}</p>
    <p><strong>Modèle:</strong> {{ $materiel->modele }}</p>
    <p><strong>Quantité:</strong> {{ $materiel->quantite }}</p>
    <p><strong>Date d'achat:</strong> {{ $materiel->date_achat }}</p>
    <p><strong>Observations:</strong> {{ $materiel->observations }}</p>

    <a href="{{ route('materiels.index') }}">Retour à la liste</a>
@endsection
