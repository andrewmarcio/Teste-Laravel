<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = []; 

    public function comments(){
        return $this->hasMany('App\Comment', 'video_id');
    }
}
