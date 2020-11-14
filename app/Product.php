<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     use SoftDeletes;
     protected $fillable = ['category_id','product_name','product_price','product_quantity','alert_uantity','product_photo'];

     function relationcategorytable()
       {
         return $this->hasOne('App\Category', 'id', 'category_id');
       }
     function relationproductsgallerytable()
       {
         return $this->hasMany('App\Products_gallery', 'product_id', 'id');
       }
}
