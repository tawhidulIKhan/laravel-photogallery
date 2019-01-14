<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $guarded = [];
    
    public function getRouteKeyName(){
        return 'name';
    }
}