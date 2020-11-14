<?php
  function getcartadded()
   {
     $mac_address = exec('getmac');
     $mac = strtok($mac_address, ' ');
    return  $cart_added = App\Cart::where('mac', $mac)->count();
   }

  function getcartaddproducts()
   {
     $mac_address = exec('getmac');
     $mac = strtok($mac_address, ' ');
    return  $cart_added = App\Cart::where('mac', $mac)->get();
   }

  function getcartaddprice()
   {
     $mac_address = exec('getmac');
     $mac = strtok($mac_address, ' ');
    $cart_products = App\Cart::where('mac', $mac)->get();
    $final_ammount = 0;
    foreach ($cart_products as $cart_product) {
      $final_ammount += $cart_product->relationproducttable->product_price * $cart_product->quantity;
    }

    return $final_ammount;
   }
