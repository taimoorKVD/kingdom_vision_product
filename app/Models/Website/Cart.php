<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Website\Product','product_id');
    }
}
