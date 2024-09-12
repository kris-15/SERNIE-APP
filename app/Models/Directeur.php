<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Directeur extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'username', 'code', 'telephone'];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
