<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Image extends Model
{
    public function icons() {
        $this->hasMany('App\DynamicIcon');
    }
    protected $guarded = [];
    public function src() {
        return '/dynamic_images/'.$this->created_at.".png";
    }
    public static function create(array $options = Array()) {
        $data = $options['data'];
        unset($options['data']);
        $obj = parent::create($options);
        file_put_contents(public_path().'/dynamic_images/'.$obj->created_at.".png", $data);
        return $obj;
    }
}
