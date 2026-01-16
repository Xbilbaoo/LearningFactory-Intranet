<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasea extends Model
{
    use HasFactory;

    protected $table = "faseas";
    protected $primaryKey = "faseID";

    protected $fillable = [
        'faseID',
        'izena',
        'deskribapena'
    ];

    public function zerginakDitu(): HasMany { return $this->hasMany(Zeregina::class); }

}
