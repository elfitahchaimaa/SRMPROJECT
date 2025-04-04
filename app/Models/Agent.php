<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = ['nom_complet', 'cin', 'departement', 'division', 'service', 'site'];

     public function materiels()
    {
        return $this->hasMany(Materiel::class);
    } 


   /*  public function materiaux()
    {
        return $this->belongsToMany(Materiel::class, 'agent_materiel')
                    ->withPivot('quantite', 'date_affectation');
    } */
}