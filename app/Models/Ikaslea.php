<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ikaslea extends Model
{

    use HasFactory;

    protected $table = "ikasleas";
    protected $primaryKey = "IkasleID";

    protected $fillable = [
        'ikasleID',
        'izena',
        'abizena',
        'email',
        'pasahitza',
        'rola'
    ];

    public function taldekoaDa(): BelongsTo { return $this->belongsTo(Taldea::class); }
}
