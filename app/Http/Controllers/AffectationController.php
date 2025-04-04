<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use App\Models\Agent;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    // Afficher la liste des matériels avec leur agent
    public function index()
    {
        $materiels = Materiel::with('agent')->get();
        return view('affectations.index', compact('materiels'));
    }

    // Afficher le formulaire d'affectation
    public function create()
    {
        $materiels = Materiel::whereNull('agent_id')->get(); // Matériels non affectés
        $agents = Agent::all();
        return view('affectations.create', compact('materiels', 'agents'));
    }

    // Enregistrer l'affectation
    public function store(Request $request)
    {
        $request->validate([
            'materiel_id' => 'required|exists:materiels,id',
            'agent_id' => 'required|exists:agents,id',
        ]);

        $materiel = Materiel::findOrFail($request->materiel_id);
        $materiel->agent_id = $request->agent_id;
        $materiel->save();

        return redirect()->route('affectations.index')->with('success', 'Matériel affecté avec succès!');
    }

    // Désaffecter un matériel
    public function destroy($id)
    {
        $materiel = Materiel::findOrFail($id);
        $materiel->agent_id = null;
        $materiel->save();

        return redirect()->route('affectations.index')->with('success', 'Affectation supprimée!');
    }
    public function agentsMateriels(Request $request)
{
    $query = Agent::with('materiels');

    if ($request->has('filter') && $request->has('search')) {
        $filter = $request->filter;
        $search = $request->search;

        // Vérifier si le filtre est valide
        if (in_array($filter, ['cin', 'nom_complet', 'departement', 'division', 'service'])) {
            $query->where($filter, 'LIKE', "%$search%");
        }
    }

    $agents = $query->get();
    return view('affectations.agents_materiels', compact('agents'));
}

// rachercher 

}