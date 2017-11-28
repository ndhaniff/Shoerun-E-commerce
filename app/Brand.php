<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function Products(){
        return $this->belongsTo('App\Product','product_brand');
    }
}
