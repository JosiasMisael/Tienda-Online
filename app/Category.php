<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
  //  use Sluggable;


    public function products()
    {
        return $this->hasMany(Product::class);
    }

  /*  public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }*/
}
