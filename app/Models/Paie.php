<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paie extends Model
{
    use HasFactory;
    protected $fillable = [
        'personnel_id',
        'salaire_base',
        'prime',
        'deduction',
        'salaire_net',
        'date_paie',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
