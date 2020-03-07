<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'price',
        'short_des'
        ];
    public function setNameAttribute ($name) {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public  function category ()
    {
        return $this->belongsTo('App\Category');
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }
}

