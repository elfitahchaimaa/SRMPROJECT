<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $equipments = Equipment::all(); // Récupération des équipements
        return view('dashboard.index', compact('equipments'));
    }
}
