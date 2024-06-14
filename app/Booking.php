<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
protected $fillable = ['user_id', 'guide_id', /* other fields */];

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function guide()
{
    return $this->belongsTo(Guide::class);
}
}
