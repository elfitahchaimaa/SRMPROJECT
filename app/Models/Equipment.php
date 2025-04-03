<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = [
        'code',
        'nom',
        'utilisateur',
        'departement',
        'date_achat',
        'statut'
    ];
}