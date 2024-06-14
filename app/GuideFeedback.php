<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class GuideFeedback extends Model
{
    protected $table = 'guide_feedback';

    protected $fillable = [
        'from', 
        'to', 
        'rate',
        'feedback',
        'for',
    ];
    protected $appends = ['username', 'user'];

    public function user(){
        return $this->belongsTo(User::class, 'from');
    }

    public function getUserAttribute()
    {
        $user = User::find($this->from);
        return $user ? $user->name : 'Unknown User';
    }
    public function getUsernameAttribute()
    {
        $user = User::find($this->from);
        return $user ? $user->username : 'Unknown Username';
    }

}
