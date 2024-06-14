<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username' ,'name', 'email', 'password','city', 'country', 'image', 'city', 'country', 'language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = array('avgrate');

    public function getAvgrateAttribute(){
        return round($this->guideFeedback->avg('rate'), 0);
    }

    public function guideProfile(){
        return $this->hasOne('App\GuideProfile');
    }

    public function guideFeedback() 
    {
        return $this->hasMany('App\guideFeedback', 'to');
    }

    public function touristArea() 
    {
        return $this->hasMany('App\touristArea');
    }
}
