<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function artwork()
{
    return $this->belongsTo(\App\Models\Artwork::class);
}
}
