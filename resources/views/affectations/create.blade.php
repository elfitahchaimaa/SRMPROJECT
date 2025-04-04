@extends('layouts.app')

@section('content')
    <h2>Affecter un Matériel</h2>
    <form action="{{ route('affectations.store') }}" method="POST">
        @csrf
        <label>Choisir un Matériel :</label>
        <select name="materiel_id" required>
            @foreach($materiels as $materiel)
                <option value="{{ $materiel->id }}">{{ $materiel->matricule }} - {{ $materiel->type }}</option>
            @endforeach
        </select>

        <label>Choisir un Agent :</label>
        <select name="agent_id" required>
            @foreach($agents as $agent)
                <option value="{{ $agent->id }}">{{ $agent->nom_complet }}</option>
            @endforeach
        </select>

        <button type="submit">Affecter</button>
    </form>
@endsection
