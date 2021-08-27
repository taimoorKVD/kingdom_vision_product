<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function admin_city() {
        return $this->hasMany('App\User');
    }
}
