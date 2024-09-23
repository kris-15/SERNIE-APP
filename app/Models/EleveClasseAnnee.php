<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EleveClasseAnnee extends Model
{
    use HasFactory;
    protected $fillable = ['eleve_id', 'classe_id', 'annee_scolaire_id'];
}
