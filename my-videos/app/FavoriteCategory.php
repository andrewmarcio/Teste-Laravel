<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteCategory extends Model
{
    protected $table = 'favorite_categories';

    protected $guarded = [];

    public $timestamps = false;
}
