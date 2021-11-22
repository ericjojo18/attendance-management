<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emerge extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date_coming',
        'departure_date',
    ];

}
