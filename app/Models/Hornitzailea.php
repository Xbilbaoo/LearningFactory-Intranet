<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hornitzailea extends Model
{
    use HasFactory;

    protected $table = "hornitzaileas";
    protected $primaryKey = "hornitzaileID";


    protected $fillable = [
        'hornitzaileID',
        'izena',
        'cif',
        'email',
        'helbidea',
        'telefonoa'
    ];

    public function materialaSaldu() : HasOne { return $this->hasOne(Materiala::class); }
}
