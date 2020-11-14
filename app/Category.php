<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    // function relationproductable()
    //   {
    //     return $this->hasMany('App\Product', 'id', 'product_id');
    //   }
}
