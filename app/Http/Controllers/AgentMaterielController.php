<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Materiel;
use Illuminate\Http\Request;

class AgentMaterielController extends Controller
{
    public function affecterMateriel(Request $request, $agentId, $materielId)
    {
        $agent = Agent::findOrFail($agentId);
        $materiel = Materiel::findOrFail($materielId);

        $agent->materiaux()->attach($materiel, [
            'quantite' => $request->quantite,
            'date_affectation' => now(),
        ]);

        return response()->json(['message' => 'Matériel affecté avec succès.']);
    }

    public function obtenirMateriauxAgent($agentId)
    {
        $agent = Agent::findOrFail($agentId);
        $materiaux = $agent->materiaux;

        return response()->json($materiaux);
    }public function afficherFormulaireAffectation($agentId, $materielId)
    {
        $agent = Agent::findOrFail($agentId);
        $materiel = Materiel::findOrFail($materielId);

        return view('agent_materiel.affecter', compact('agent', 'materiel'));
    }

    
}