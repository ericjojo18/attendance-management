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
        'type_formation',
        'beginDate',
        'endDate',
    ];
}
