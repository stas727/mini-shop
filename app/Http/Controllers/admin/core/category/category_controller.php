<?php

namespace App\Http\Controllers\admin\core\category;


use App\Http\Requests\category\create;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\category;
use App\HtmlCreate\BuildTreeCategories;
use App\models\category_descriptions;
use Illuminate\Support\Facades\App;

class category_controller extends Controller
{

   public function index()
   {
      $categories = category::all();
      $tree = category::where('parent_id', NULL)->get();

      $btg = new BuildTreeCategories($tree);

      if ($btg->categories != NULL) {
         $tree = $btg->getTreeHtml();
      }


      return view('admin.category.categorySettings', compact('categories', 'tree'));
   }

   public function createCategory(create $request)
   {

      if (empty($request->parent_category)) {
         $desc = category_descriptions::create(['category' => $request->new_category]);
         category::create(['category_description_id' => $desc->id]);
         $message = "Создана новая основная категория";
      } else {
         $parent = category::find($request->parent_category);
         $desc = category_descriptions::create([
            'category' => $request->new_category,
         ]);
         $child = category::create(['category_description_id' => $desc->id]);
         $child->makeChildOf($parent);
         $child->save();
         $message = "Создана подкатегория категории $request->parent_category";
      }
      return redirect()->back()->with('message', $message);
   }

   public function destroy(Request $request)
   {

      $category = category::find($request->id)->delete();
      return 'ok';
   }

   public function edit($id)
   {
      $category = category::find($id);
      $category_description = category_descriptions::find($category->category_description_id);

      return view('admin.category.edit', compact('category_description'));
   }

   public function update(Request $request)
   {
      category_descriptions::where('id' , $request->category_id)->update($request->except('_token', 'category_id'));
     return redirect()->back()->with('message' , 'successfully updated');
   }
}
