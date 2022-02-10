<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable =[
        'partenaire_id',
        'referentiel_id',
        'training',
        'beginDate',
        'endDate',
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class,'partenaire_id');
    }
    public function referentiel()
    {
        return $this->belongsTo(Referentiel::class,'referentiel_id');
    }
}
