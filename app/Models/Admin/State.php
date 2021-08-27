<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function admin_state()
    {
        return $this->hasMany('App\User');
    }
}
