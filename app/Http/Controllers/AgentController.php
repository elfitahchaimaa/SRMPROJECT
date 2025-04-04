<?php



namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function create()
{
    $departements = [
        'Département Support' => [
            'Division Administrative et Financière',
            'Division achat moyens généraux et logistique',
            'Division juridique et assurance',
            'Division système d\'information'
        ],
        'Département Clientèle' => [
            'Division Grand Compte',
            'Division Client Particulier',
            'Division Excès de Client Particulier',
            'Division Comptage et Infraction'
        ],
        'Département Exploitation Electricité' => [
            'Division Gestion des Conduite des Réseaux Électricité',
            'Division Entretien et Maintenance',
            'Division Mesure et Protection et amélioration des Rendements'
        ],
        'Département Études et Travaux' => [
            'Division Études et Travaux Réseaux au Potable',
            'Division Études-Travaux-Réseau Assainissement',
            'Division Études et Travaux Réseau Électrique',
            'Division Travaux Remboursables'
        ],
        'Département Exploitations au Potable' => [
            'Division Gestion et Conduite des Ouvrages et Réseaux au Potable',
            'Division Entretien et Maintenance des Ouvrages et Réseaux d\'Eau',
            'Division Mesures et Amélioration des Rendements'
        ],
        'Département Exploitations Assainissement Liquide' => [
            'Division Exploitations des Ouvrages et Réseaux Assainissement Liquide',
            'Division Entretien et Maintenance des Ouvrages et Réseaux d\'Assainissement Liquide',
            'Division Suivi Environnement et Réutilisation'
        ],

    ];
    return view('agents.create', compact('departements'));
}


   
public function store(Request $request)
{

   
    $request->validate([
        'nom_complet' => 'required|string|max:255',
        'cin' => 'required|string|max:10|unique:agents',
        'departement' => 'required',
        'division' => 'required',
        'service' => 'required',
        'site' => 'required'
    ]);

    Agent::create($request->all());

    return redirect()->route('agents.index')->with('success', 'Agent ajouté avec succès');
}


    public function show(Agent $agent)
    {
        return view('agents.show', compact('agent'));
    }
    public function edit(Agent $agent)
    {
        $departements = [
            'Département Support' => [
                'Division Administrative et Financière',
                'Division achat moyens généraux et logistique',
                'Division juridique et assurance',
                'Division système d\'information'
            ],
            'Département Clientèle' => [
                'Division Grand Compte',
                'Division Client Particulier',
                'Division Excès de Client Particulier',
                'Division Comptage et Infraction'
            ],
            'Département Exploitation Electricité' => [
                'Division Gestion des Conduite des Réseaux Électricité',
                'Division Entretien et Maintenance',
                'Division Mesure et Protection et amélioration des Rendements'
            ],
            'Département Études et Travaux' => [
                'Division Études et Travaux Réseaux au Potable',
                'Division Études-Travaux-Réseau Assainissement',
                'Division Études et Travaux Réseau Électrique',
                'Division Travaux Remboursables'
            ],
            'Département Exploitations au Potable' => [
                'Division Gestion et Conduite des Ouvrages et Réseaux au Potable',
                'Division Entretien et Maintenance des Ouvrages et Réseaux d\'Eau',
                'Division Mesures et Amélioration des Rendements'
            ],
            'Département Exploitations Assainissement Liquide' => [
                'Division Exploitations des Ouvrages et Réseaux Assainissement Liquide',
                'Division Entretien et Maintenance des Ouvrages et Réseaux d\'Assainissement Liquide',
                'Division Suivi Environnement et Réutilisation'
            ],

        ];
        return view('agents.edit', compact('agent', 'departements'));
    }
    

    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            'nom_complet' => 'required|string|max:255',
            'cin' => 'required|string|max:10|unique:agents,cin,' . $agent->id,
            'departement' => 'required',
            'division' => 'required',
            'service' => 'required',
            'site' => 'required'
        ]);
    
        $agent->update($request->all());
    
        return redirect()->route('agents.index')->with('success', 'Agent modifié avec succès');
    }
    
public function destroy(Agent $agent)
{
    $agent->delete();
    return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès');
}


}