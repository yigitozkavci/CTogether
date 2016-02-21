<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicIcon extends Model
{
    public function image() {
        $this->belongsTo('App\Image');
    }
    protected $guarded = [];
}
