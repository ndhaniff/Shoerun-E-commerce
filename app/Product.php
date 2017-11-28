<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function owner(){
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->belongsToMany('App\Orders');
    }

    public function category(){
        return $this->belongsToMany('App\Category','product_category');
    }

    public function gallery(){
        return $this->hasMany('App\Gallery');
    }

    public function types(){
        return $this->belongsToMany('App\Type','product_type');
    }

    public function brands(){
        return $this->belongsToMany('App\Brand','product_brand');
    }
}
