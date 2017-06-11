<?php
/**
 * Created by PhpStorm.
 * User: stas_
 * Date: 25.01.2017
 * Time: 10:24
 */

namespace App\HtmlCreate;


use App\models\category;


class BuildTreeCategories
{
   public $categories;
   static $index;

   public function __construct($tree)
   {
      if (!empty($tree[0])) {
         foreach ($tree as $item) {
            $categories[] = category::where('id', $item->id)->first()->getDescendantsAndSelf()->toHierarchy();
         }
         return $this->categories = $categories;
      } else {
         return FALSE;
      }
   }

   public function getTreeHtml()
   {
      self::$index = 1;
      $res = $this->buildTree();
      return $res;
   }

   /**
    * @return array
    */
   public function buildTree()
   {

      $res = '';
      foreach ($this->categories as $categories) {
         foreach ($categories as $category) {
            $res .= "<li class='dd-item' data-id=''" . self::$index . ">  <input type=\"hidden\" name=\"id\" value=\"$category->id\"><input type=\"hidden\" name=\"category\" value=\"{$category->descriptions->category}\"> <div class=\"pull-right delete btn btn-outline btn-danger  dim btn-xs\" value=\"$category->id\" style=\"margin-top: 5px\">Delete</div>
                <a href='/admin/category/edit/$category->id' class=\"pull-right  btn btn-outline btn-warning dim btn-xs\"  style=\"margin-top: 5px\">Edit  </a>";
            $res .= " <div class=\"dd-handle\" id='$category->id'>" . self::$index . " - {$category->descriptions->category}</div>";
            if (isset($category->children)) {
               self::$index++;
               $res .= $this->buildChildren($category->children);
            }
            $res .= "</li>";
         }
      }
      self::$index++;
      return $res;
   }

   public function buildChildren($children)
   {
      $res = "";
      $res .= "<ol class='dd-list'>";
      foreach ($children as $child) {
         $res .= "<li class='dd-item' data-id='" . self::$index . "'><input type=\"hidden\" name=\"id\" value=\"$child->id\"><input type=\"hidden\" name=\"category\" value=\"{$child->descriptions->category}\"><div class=\"pull-right delete btn btn-outline btn-danger  dim btn-xs\" value=\"$child->id\" style=\"margin-top: 5px\">Delete</div>
                <a href='/admin/category/edit/$child->id' class=\"pull-right  btn btn-outline btn-warning dim btn-xs\"  style=\"margin-top: 5px\">Edit  </a><div class='dd-handle' id='$child->id'>" . self::$index . " - {$child->descriptions->category}</div></li>";
         self::$index++;
         if (isset($child->children)) {
            $res .= $this->buildChildren($child->children);
         }
      }
      $res .= "</ol>";
      return $res;
   }
}