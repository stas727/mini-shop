<?php

namespace App\Http\Controllers\admin\core\products;

use App\Http\Requests\product\createPoduct;
use App\models\category;
use App\models\product;
use App\models\product_options;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class product_controller extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $products = product::orderBy('created_at', 'DESC')->paginate(12);

      $products->load('options', 'category');

      return view('admin.products.products', compact('products'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = category::all();

      return view('admin.products.create', compact('categories'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(createPoduct $request)
   {

      if (empty($request->id)) {

         $options = new product_options();
         $options->ram = $request->ram;
         $options->storage = $request->storage;
         $options->operation_system = $request->operation_system;
         $options->save();
         $product = new product();
         if ($request->hasFile('image')) {
            $file = Input::file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $path = public_path('/images/' . $name);
            Image::make($path)->resize(640, 400)->save($path);
            $product->image = $name;
         }
         $product->name = $request->name;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->category_id = $request->category_id;
         $product->options()->associate($options);
         $product->save();
      } else {
         $this->update($request);
      }

      return redirect(Config::get('const.ADMIN_URL') . '/products')->with('message', trans('messages.SuccessCreateProduct'));
   }

   /**
    * Display the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {

      $product = product::find($id);
      if (empty($product)) {
         return redirect()->back()->with('message', trans('messages.noProduct'));
      }

      $categories = category::all();
      return view('admin.products.create', compact('product', 'categories'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request)
   {

      $product = product::find($request->id);
      $product->name = $request->name;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->category_id = $request->category_id;

      if ($request->hasFile('image')) {
         $file = Input::file('image');
         $name = $file->getClientOriginalName();
         $file->move(public_path() . '/images/', $name);
         $path = public_path('/images/' . $name);
         Image::make($path)->resize(640, 400)->save($path);
         $product->image = $name;
      }
      $product->save();
      $options = product_options::find($product->option_id);
      $options->ram = $request->ram;
      $options->storage = $request->storage;
      $options->operation_system = $request->operation_system;
      $options->save();

   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Request $request)
   {
      product::find($request->id)->delete();

   }
}
