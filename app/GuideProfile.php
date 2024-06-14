<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideProfile extends Model
{
    protected $table = 'guide_profile';

    protected $fillable = [
        'rate_per_day', 
        'certificate_image', 
        'availability_status',
        'skill_experience', 
        'languages',
        'tour_date'
    ];

    public function user(){
        return $this->hasOne('App\User');
    }
}
