<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'slug';
    }

}
