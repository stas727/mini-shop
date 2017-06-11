<?php

namespace App\Http\Controllers\front\products;

use App\models\category;
use App\models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class product_controller extends Controller
{
   public function index()
   {
      //category
      $categories = category::all();
      //products

      $products = new product();
      $queries = [];
      $message = '';
      if (request()->has('search')) {
         $products = $products->search(request('search'));
         $message = 'Результаты поиска :';
      }


      if (request()->has('min') && request()->has('max')) {
         $products = $products->where('price', '>=', request('min'))
            ->where('price', '<=', request('max'));
      }
      if (request()->has('category')) {
         $products = $products->where('category_id', request('category'));
         $queries['category'] = request('category');
      }
      if (request()->has('sort')) {
         $products = $products->orderBy('created_at', request('sort'));
         $queries['sort'] = request('sort');
      }
      $products = $products->paginate(12)->appends($queries);
      return view('front.index', compact('products', 'categories', 'message'));
   }

   public function show($id)
   {
      $categories = category::all();
      $product = product::find($id);
      $product->load('options');
      $products = product::where('category_id', $product->category->id)->where('id', '!=', $product->id)->inRandomOrder()->take(3)->get();

      return view('front.products.product', compact('product', 'categories', 'products'));
   }


}
