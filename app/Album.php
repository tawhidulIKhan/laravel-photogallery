<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        
        return "slug";

    }

    public function gallery(){
        return $this->hasMany(Photo::class);
    }
}
