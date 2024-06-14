<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TouristArea extends Model
{
    protected $table = 'tourist_area';

    protected $fillable = [
        'title', 
        'description', 
        'image',
        'city', 
        'country'
    ];
}
