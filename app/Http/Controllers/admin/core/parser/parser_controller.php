<?php

namespace App\Http\Controllers\admin\core\parser;

use App\models\category;
use App\models\category_descriptions;
use App\models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class parser_controller extends Controller
{
   public function index($category)
   {

   }

   public function getCategories()
   {
      $file = file_get_contents("http://planeta.kh.ua/catalog/mobile.html");
      preg_match_all('/<div class=\"subcat\">(.*?)<\/div>/s', $file, $categories);
      if (!empty($categories)) {
         foreach ($categories[0] as $category) {
            preg_match('/<span>(.*?)<\/span>/s', $category, $cat);
            $brands[] = $cat;
         }
      }


      return view('admin.parser.categories', compact('brands'));
   }

   public function getProduct(Request $request)
   {

       $file = file_get_contents("http://planeta.kh.ua/catalog/mobile.html");
      preg_match_all('/<div class=\"subcat\">(.*?)<\/div>/s', $file, $categories);
      if (!empty($categories)) {
         foreach ($categories[0] as $category) {
            preg_match('/<span>(.*?)<\/span>/s', $category, $cat);
            $brands[] = $cat;
         }
      }
      $content = file_get_contents("http://planeta.kh.ua/catalog/mobile-{$request->category}.html");
      preg_match_all('/<div class=\"photo\">(.*?)<\/div>/s', $content, $photos);
      preg_match_all('~<div class=\"info\">\s*(<div.*?<div.*?</div>\s*)?(.*?)</div>~is', $content, $info);
      preg_match_all('/<div class=\"descr\">(.*?)<\/div>/s', $content, $descr);

      if (!empty($photos)) {
         foreach ($photos[0] as $key => $photo) {
            preg_match_all("/<img .*?(?=src)src=\"([^\"]+)\"/si", $photo, $res);
            $products[$key]['image'] = $res[1][0];
         }
      }
      //dd($info);
      foreach ($info[0] as $key => $inf) {
         $temp = $inf;
         preg_match_all("#<a.*?>([^<]+)</a>#", $temp, $res);

         $products[$key]['name'] = trim(strip_tags($res[0][0]));
         preg_match_all('/<div class=\"uah\">(.*?)<\/div>/s', $inf, $res);
         $products[$key]['price'] = trim(strip_tags($res[1][0]));
      }

      foreach ($descr[1] as $key => $desc) {

         $products[$key]['description'] = trim(strip_tags($desc));
      }
      if(!empty($products)){
         $countNewProduct =  $this->saveProducts($products, $request->category);
         $message = 'successfully parse new products! Count is ' . $countNewProduct;
      }else{
         $message = 'Products not found!';
      }




      return view('admin.parser.categories', compact('brands'))->with('message' , $message);
   }


   public function saveProducts($products , $category)
   {

      $category_description = category_descriptions::updateOrCreate(
         ['category' => $category]
      );
     $category = category::updateOrCreate(
         ['category_description_id' => $category_description->id]
      );
      $countNewProduct = 0;
     foreach ($products as $product){
        if(!empty($product)){
            $countNewProduct++;
           product::updateOrCreate([
             'name' => $product['name'], 'price' => $product['price'], 'image' => $product['image'] ,'category_id' => $category->id , 'description' => $product['description']
           ]);
        }
     }
return $countNewProduct;
   }
}
