<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ikaslea extends Model
{
    use HasFactory;

    protected $primaryKey = 'ikasleID'; // O 'id' si no lo cambiaste en la migración

    protected $fillable = [
        'izena',
        'abizena',
        'userID',  // Importante para relacionar con users
        'taldeID'  // Importante para relacionar con taldeas
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }

    public function taldea(): BelongsTo
    {
        return $this->belongsTo(Taldea::class, 'taldeID', 'taldeID');
    }
}
