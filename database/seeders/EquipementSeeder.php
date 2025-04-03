<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;
use Carbon\Carbon;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Equipment::insert([
            [
                'code' => 'EQP-001',
                'nom' => 'Ordinateur Portable Dell',
                'utilisateur' => 'Jean Dupont',
                'departement' => 'Marketing',
                'date_achat' => Carbon::parse('2024-01-15'),
                'statut' => 'Actif'
            ],
            [
                'code' => 'EQP-002',
                'nom' => 'Imprimante HP',
                'utilisateur' => 'Marie Martin',
                'departement' => 'Ressources Humaines',
                'date_achat' => Carbon::parse('2023-11-20'),
                'statut' => 'En maintenance'
            ],
            [
                'code' => 'EQP-003',
                'nom' => 'Smartphone Apple',
                'utilisateur' => 'Pierre Lefebvre',
                'departement' => 'Commercial',
                'date_achat' => Carbon::parse('2024-02-05'),
                'statut' => 'Actif'
            ]
        ]);
    }
}