<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class GuideBooking extends Model
{
    protected $table = 'guide_booking';

    protected $fillable = [
        'from', 
        'to', 
        'status',
        'description', 
        'tour_date',
        'days', 
        'time', 
        'number_of_people', 
        'type_of_tour'
    ];
    
    protected $appends = array('fromname', 'fromusername', 'toname', 'tousername');

    public function getFromnameAttribute()
    {
        $user = User::find($this->from);
        return $user ? $user->name : 'N/A';
    }
    public function getFromusernameAttribute()
    {
        $user = User::find($this->from);
        return $user ? $user->username : 'N/A';
    }
    public function getTonameAttribute()
    {
        $user = User::find($this->to);
        return $user ? $user->name : 'N/A';
    }
    public function getTousernameAttribute()
    {
        $user = User::find($this->to);
        return $user ? $user->username : 'N/A';
    }
}
