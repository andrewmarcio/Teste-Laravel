<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class FavoriteCategory extends Pivot
{
    protected $table = 'favorite_categories';

    protected $guarded = [];

    public $timestamps = false;
}
