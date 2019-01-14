<?php

namespace App;

use App\User;
use App\Album;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function album(){
        
        return $this->belongsTo(Album::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
