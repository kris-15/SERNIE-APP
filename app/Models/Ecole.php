<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ecole extends Model
{
    use HasFactory;
    protected $fillable = ['denomination', 'nom', 'type', 'adresse','directeur_id'];
    public function directeur(): BelongsTo{
        return $this->belongsTo(Directeur::class);
    }
    public function classes(): HasMany{
        return $this->hasMany(Classe::class);
    }
    public function eleves(): HasMany{
        return $this->hasMany(Eleve::class);
    }
}
