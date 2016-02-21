<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function questions() {
        $this->hasMany('App\Question');
    }
    protected $guarded = [];
}
