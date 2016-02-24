<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
