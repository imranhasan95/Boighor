<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   protected $guarded = [];
   
  function relationproducttable()
    {
      return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
