<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Assure que seuls les utilisateurs connectés y accèdent
    }

    public function index()
    {
        $equipments = Equipment::all(); // Récupération des équipements
        return view('dashboard.index', compact('equipments'));
        
        dd(Auth::check()); // Devrait afficher "true" si l'utilisateur est bien connecté
    }
}

