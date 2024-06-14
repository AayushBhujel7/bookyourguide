<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User1 extends Model
{
    use HasFactory;
    protected $table = 'users';
    // ... other attributes and methods ...

    /**
     * Define a one-to-many relationship with the Booking model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id');
    }
}
