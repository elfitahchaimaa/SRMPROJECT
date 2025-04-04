@extends('layouts.app')

@section('content')
    <h2>Liste des Affectations</h2>
    <a href="{{ route('affectations.create') }}">Nouvelle Affectation</a>
    <table border="1">
        <tr>
            <th>Matériel</th>
            <th>Type</th>
            <th>Agent Affecté</th>
            <th>Actions</th>
        </tr>
        @foreach($materiels as $materiel)
            <tr>
                <td>{{ $materiel->matricule }}</td>
                <td>{{ $materiel->type }}</td>
                <td>
                    {{ $materiel->agent ? $materiel->agent->nom_complet : 'Non affecté' }}
                </td>
                <td>
                    @if ($materiel->agent)
                        <form action="{{ route('affectations.destroy', $materiel->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Désaffecter</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection
