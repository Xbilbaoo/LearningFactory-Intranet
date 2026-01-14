<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Materiala extends Model
{
    use HasFactory;

    protected $table = "materialas";
    protected $primaryKey = "materialID";

    protected $fillable = [
        'materialID',
        'izena',
        'deskribapena',
        'stock'
    ];

    public function hornitzaileaDa(): BelongsTo { return $this->belongsTo(Hornitzailea::class); }

    public function zereginetanerabiltzenDira() : BelongsToMany { return $this->belongsToMany(Zeregina::class, "material_zeregin", "materialID", "zereginID"); }

}
