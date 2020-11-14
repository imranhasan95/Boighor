<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

use App\Product;
use App\Blog;

class SearchController extends Controller
{
  function search_results(Request $request)
   {
     $query_string = $request['query'];
     $search_products = QueryBuilder::for(Product::class)
                   ->allowedFilters('name')
                   ->get();

     return view("search", compact('search_products'));
   }

   //bolg search
  function search(Request $request)
   {
     $query_string = $request['query'];
     $users = QueryBuilder::for(Blog::class)
    ->allowedFilters('name')
    ->get();

    return view("search_blog", compact('users'));

   }
}
