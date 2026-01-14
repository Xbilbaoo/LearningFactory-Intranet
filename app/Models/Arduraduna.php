<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Arduraduna extends Model
{
    use HasFactory;

    protected $table = "arduradunas";
    protected $primaryKey = "arduradunID";

    protected $fillable = [
        'arduradunID',
        'izena',
        'abizena',
        'email',
        'pasahitza',
        'rola'
    ];

    /*public function zereginakDitu(): HasMany
    {

        return $this->hasMany(Zeregina::class);
    }*/
}
