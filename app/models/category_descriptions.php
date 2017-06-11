<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class category_descriptions extends Model
{
   public $table = 'category_descriptions';

   public $timestamps = false;

   public $fillable = ['category', 'image', 'url'];



}
