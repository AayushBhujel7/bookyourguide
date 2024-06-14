<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ad';

    protected $fillable = [
        'isBanner', 
        'isTopBanner',
        'adcode', 
        'image',
        'status'
    ];
}
