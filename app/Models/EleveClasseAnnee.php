<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EleveClasseAnnee extends Model
{
    use HasFactory;
    protected $fillable = ['eleve_id', 'classe_id', 'annee_scolaire_id'];
    public function eleves(): BelongsTo{
        return $this->belongsTo(Eleve::class, 'eleve_id');
    }
    public function classes(): BelongsTo{
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
