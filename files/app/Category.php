<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name',
      'slug',
      'image'
    ];
    /*чтобы вернуть slug*/
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
