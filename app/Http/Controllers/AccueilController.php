<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        // Récupérer tous les services depuis la base de données
        $services = Service::all();

        // Passer la variable $services à la vue 'accueil'
        return view('acceuil', compact('services'));
    }
}
