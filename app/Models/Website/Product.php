<?php

namespace App\Models\Website;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'category_id', 'price', 'status'
    ];

    public function cart() {
        return $this->hasMany('App\Models\Website\Cart');
    }
}
