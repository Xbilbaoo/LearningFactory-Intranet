<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Zeregina extends Model
{
    use HasFactory;

    protected $table = "zereginas";
    protected $primaryKey = "zereginID";

    protected $fillable = [
        'zereginID',
        'izena',
        'deskribapena',
        'estimazioa',
        'hasieraData',
        'amaieraData',
        'zereginPosizioa',
        'status',
        'faseID',
        'taldeID',
        'arduradunID'
    ];

    public function taldeakEginBeharDu(): BelongsTo { return $this->belongsTo(Taldea::class); }

    public function arduradunaDa(): BelongsTo { return $this->belongsTo(Arduraduna::class); }

    public function fasekoaDa(): BelongsTo { return $this->belongsTo(Fasea::class); }

    public function materialakBeharDitu() : BelongsToMany { return $this->belongsToMany(Materiala::class, "material_zeregin", "zereginID", "materialID"); }


}
