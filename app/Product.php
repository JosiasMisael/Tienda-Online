<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    public function category(){

        return $this->belongsTo(Category::class);

    }

    public function images(){

        return $this->morphMany(Image::class,'imageable');
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
