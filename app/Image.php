<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function src()
    {
        return '/dynamic_images/'.$this->created_at.'.png';
    }

    public static function create(array $options = [])
    {
        $data = $options['data'];
        unset($options['data']);
        $obj = parent::create($options);
        file_put_contents(public_path().'/dynamic_images/'.$obj->created_at.'.png', $data);

        return $obj;
    }

    public function dynamicIcons()
    {
        return $this->hasMany('App\DynamicIcon');
    }

    public function getComponents()
    {
        return $this->dynamicIcons;
    }
}
