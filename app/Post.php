<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
