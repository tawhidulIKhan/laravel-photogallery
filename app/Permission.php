<?php

namespace App;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    protected $guarded = [];
    
    public function getRouteKeyName(){
        return 'name';
    }
}