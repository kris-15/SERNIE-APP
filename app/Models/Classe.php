<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['cycle', 'salle', 'indice', 'niveau', 'section_id', 'ecole_id'];
    public function section(): BelongsTo{
        return $this->belongsTo(Section::class);
    }
    public function ecole():BelongsTo{
        return $this->belongsTo(Ecole::class);
    }
}
