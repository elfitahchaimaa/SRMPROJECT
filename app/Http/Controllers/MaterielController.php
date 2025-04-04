<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    // Afficher la vue pour ajouter un matériel
    public function create()
    {
        return view('materiels.create');
    }
    public function index()
    {
        $materiels = Materiel::all();
        return view('materiels.index', compact('materiels'));
    }

    // Sauvegarder le matériel dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'matricule' => 'required|string|unique:materiels,matricule',
            'type' => 'required|string',
            'marque' => 'required|string',
            'modele' => 'required|string',
            'systeme_exploitation' => 'nullable|string',
            'quantite' => 'required|integer|min:1',
            'date_achat' => 'nullable|date',
            'observations' => 'nullable|string',
            'agent_id' => 'nullable|exists:agents,id', // Si l'agent est sélectionné, il doit exister dans la table 'agents'
        ]);

        // Créer un nouveau matériel
        Materiel::create([
            'matricule' => $request->matricule,
            'type' => $request->type,
            'marque' => $request->marque,
            'modele' => $request->modele,
            'systeme_exploitation' => $request->systeme_exploitation,
            'quantite' => $request->quantite,
            'date_achat' => $request->date_achat,
            'observations' => $request->observations,
            //'agent_id' => $request->agent_id,
        ]);

        // Rediriger vers une page avec un message de succès
        return redirect()->route('materiels.index')->with('success', 'Matériel ajouté avec succès!');
    }


    public function destroy(materiel $materiel)
{
    $materiel->delete();
    return redirect()->route('materiels.index')->with('success', 'materiel supprimé avec succès');
}
public function edit(Materiel $materiel)
{
    return view('materiels.edit', compact('materiel'));
}

public function update(Request $request, Materiel $materiel)
{
    // Validation des données
    $request->validate([
        
        'matricule' => 'required|string |unique:materiels,matricule',
        'type' => 'required|string',
        'marque' => 'required|string',
        'modele' => 'required|string',
        'systeme_exploitation' => 'nullable|string',
        'quantite' => 'required|integer|min:1',
        'date_achat' => 'nullable|date',
        'observations' => 'nullable|string',
        'agent_id' => 'nullable|exists:agents,id',
    ]);

    // Mettre à jour le matériel
    $materiel->update([
        'matricule' => $request->matricule,
        'type' => $request->type,
        'marque' => $request->marque,
        'modele' => $request->modele,
        'systeme_exploitation' => $request->systeme_exploitation,
        'quantite' => $request->quantite,
        'date_achat' => $request->date_achat,
        'observations' => $request->observations,
        //'agent_id' => $request->agent_id,
    ]);

    return redirect()->route('materiels.index')->with('success', 'Matériel mis à jour avec succès!');
}
public function show(Materiel $materiel)
{
    return view('materiels.show', compact('materiel'));
}


}