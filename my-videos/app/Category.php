<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    public function videos(){
        return $this->hasMany('App\Video', 'category_id');
    }
}
