<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Carbon\Carbon;
use App\Products_gallery;
use Image;
use App\Http\Requests\ProductValidation;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('verified');
      $this->middleware('checkrole');
  }

    function product()
    {
      $products =Product::withTrashed()->get();
      $categoreis = Category::all();
      return view('product.index', [
        'products' => $products,
        'categoreis' => $categoreis,
      ]);
    }

    function productinsert(ProductValidation $request)
    {

        $inser_product_Id = Product::insertGetId([
          'category_id' => $request->category_id,
          'product_name' => $request->product_name,
          'products_shot_details' => $request->products_shot_details,
          'products_long_details' => $request->products_long_details,
          'product_price' => $request->product_price,
          'product_quantity' => $request->product_quantity,
          'alert_uantity' => $request->alert_uantity,
          'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('product_photo')) {
           $product_photo = $request->file('product_photo');
           $filename = $inser_product_Id . '.' . $product_photo->getClientOriginalExtension();
            Image::make($product_photo)->resize(270, 350)->save( base_path('public/uploads/product_photos/' . $filename ),40 );
            Product::findOrFail($inser_product_Id)->update([
              'product_photo' => $filename,
            ]);
        }

        if ($request->hasFile('product_gallery')) {
        $initial = 1;
        foreach ($request->product_gallery as $single_product_gallery) {
          $db_single = $initial . '.' . $single_product_gallery->getClientOriginalExtension();
          $initial++;
           $product_loction = "public/uploads/product_gallery/".$inser_product_Id."-".$db_single;
            Image::make($single_product_gallery)->resize(450, 565)->save( base_path($product_loction),40 );
            Products_gallery::insert([
              'product_id' => $inser_product_Id,
              'galler_images' => $inser_product_Id."-".$db_single,
              'created_at' => Carbon::now()
            ]);
        }

      }

      return back()->with('status', 'Product insert successfully!');
    }

    function productdelete($product_id)
      {
        Product::findOrFail($product_id)->delete();
        return back();
      }

        function productrestor($product_id)
          {
            Product::withTrashed()->where('id', $product_id)->restore();
            return back();
          }

        function productforcedelete($product_id)
          {
            Product::withTrashed()->where('id', $product_id)->forceDelete();
            return back();
          }

        function producedit($product_id)
          {
            $product_info = Product::findOrFail($product_id);
            $categoreis = Category::all();
            return view('product.edit', [
              'product_info' => $product_info,
              'categoreis' => $categoreis,
            ]);
          }

        function producupdate(ProductValidation $request)
          {
            if ($request->hasFile('new_photo')) {
              if (Product::findOrFail($request->product_id)->product_photo != 'defaultproductphoto.jpg') {
                unlink(base_path('public/uploads/product_photos/'.Product::findOrFail($request->product_id)->product_photo));
              }
              // new photo uploads -start
              $product_photo = $request->file('new_photo');
              $filename = $request->product_id . '.' . $product_photo->getClientOriginalExtension();
               Image::make($product_photo)->resize(270, 350)->save( base_path('public/uploads/product_photos/' . $filename ),40 );
               Product::findOrFail($request->product_id)->update([
                 'product_photo' => $filename,
               ]);
              // new photo uploads -end
            }
            $product_info = Product::findOrFail($request->product_id)->update([
              'category_id' => $request->$product_id,
              'product_name' => $request->product_name,
              'product_price' => $request->product_price,
              'product_quantity' => $request->product_quantity,
              'alert_uantity' => $request->alert_uantity,
            ]);
            return redirect('product')->with('edit_status', 'Product Update successfully!');
          }
}
