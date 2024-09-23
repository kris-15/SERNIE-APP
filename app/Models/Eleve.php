<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Eleve extends Model
{
    /**
     * Pour une année scolaire l'élève ne peut étudier que dans une seule école
     * Mais pour tout un cursus, l'élève peut fréquenter plusieurs écoles
     */
    use HasFactory;
    protected $fillable = ['nom', 'postnom', 'prenom', 'lieu', 'date_naissance', 'sexe', 'adresse', 'matricule'];
    public function ecoles(): BelongsToMany{
        return $this->belongsToMany(Ecole::class);
    }
    public function classes(): BelongsToMany{
        return $this->belongsToMany(Classe::class);
    }
}
