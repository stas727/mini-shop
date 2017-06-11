<?php

namespace App\Http\Controllers\admin;

use App\HtmlCreate\BuildTreeCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\category;


class pages_controller extends Controller
{
   public function main()
   {
      return view('admin.main');
   }

   public function products()
   {
      return view('admin.products.products');
   }

   public function categories()
   {
      $categories = category::all();
      $tree = category::where('parent_id', NULL)->get();

      $btg = new BuildTreeCategories($tree);

      if ($btg->categories != NULL) {
         $tree = $btg->getTreeHtml();
      }


      return view('admin.category.categorySettings', compact('categories', 'tree'));
   }

   public function parser()
   {
      return view('admin.parser.parser');
   }
}
