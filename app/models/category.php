<?php

namespace App\models;

use Baum\Node;

class category extends Node
{
   public $timestamps = true;

   public $fillable = ['category_description_id', 'parent_id', 'lft', 'rgt', 'depth', 'created_at', 'updated_at'];

   public function descriptions()
   {
      return $this->belongsTo('App\models\category_descriptions', 'category_description_id');
   }

   public function products()
   {
      return $this->hasMany(product::class);
   }
}
