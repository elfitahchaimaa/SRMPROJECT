<?php

namespace Database\Seeders;

// database/seeders/PaieSeeder.php
use App\Models\Paie;
use Illuminate\Database\Seeder;

class PaieSeeder extends Seeder
{
    public function run()
    {
        Paie::insert([
            ['user_id' => 1, 'salaire_brut' => 4500, 'salaire_net' => 3487.50, 'date_paie' => '2025-03-31', 'status' => 'Complété'],
            ['user_id' => 2, 'salaire_brut' => 3800, 'salaire_net' => 2945.00, 'date_paie' => '2025-03-31', 'status' => 'Complété'],
        ]);
    }
}

