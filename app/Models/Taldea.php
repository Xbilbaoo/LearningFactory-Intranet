<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Taldea extends Model
{
    use HasFactory;

    protected $table = "taldeas";
    protected $primaryKey = "taldeID";

    protected $fillable = [
        'taldeID',
        'izena',
        'Deskribapena'
    ];

    public function ikasleaDitu(): HasMany
    {

        return $this->hasMany(Ikaslea::class);
    }

    public function zereginakEgin(): HasMany { return $this->hasMany(Zeregina::class); }
}
