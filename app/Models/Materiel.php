<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $fillable = ['matricule','type', 'marque', 'modele', 'systeme_exploitation', 'quantite', 'date_achat', 'observations','agent_id'];

     public function agent()
    {
        return $this->belongsTo(Agent::class);
    } 
    /* public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_materiel')
                    ->withPivot('quantite', 'date_affectation');
    }  */
}