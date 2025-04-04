<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipement;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que seuls les utilisateurs connectés y accèdent
    }

    public function index()
    {
        $equipments = Equipement::all(); // Corrected from Equipment to Equipement
        return view('dashboard.index', compact('equipments'));
        
        // Note: La ligne ci-dessous est commentée car elle arrêterait l'exécution avant le return
        // dd(Auth::check()); // Devrait afficher "true" si l'utilisateur est bien connecté
    }
}