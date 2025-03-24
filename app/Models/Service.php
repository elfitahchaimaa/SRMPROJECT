<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // (Facultatif) Si tu veux spécifier les colonnes pouvant être remplies
    protected $fillable = ['title', 'description', 'icon'];
}
