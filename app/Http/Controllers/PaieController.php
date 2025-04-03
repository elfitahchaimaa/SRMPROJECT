<?php

namespace App\Http\Controllers;

use App\Models\Paie;
use Illuminate\Http\Request;

class PaieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paies = Paie::with('personnel')->get();
        return view('paies.index', compact('paies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'salaire_base' => 'required|numeric',
            'statut' => 'required|in:brouillon,en_attente,complete'
        ]);

        $paie = Paie::create($validatedData);

        return redirect()->route('paies.index')->with('success', 'Bulletin de paie créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paie $paie)
    {
        return view('paies.show', compact('paie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paie $paie)
    {
        return view('paies.edit', compact('paie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paie $paie)
    {
        $validatedData = $request->validate([
            'salaire_base' => 'numeric',
            'statut' => 'in:brouillon,en_attente,complete'
        ]);

        $paie->update($validatedData);

        return redirect()->route('paies.index')->with('success', 'Bulletin de paie mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paie $paie)
    {
        $paie->delete();

        return redirect()->route('paies.index')->with('success', 'Bulletin de paie supprimé');
    }
}