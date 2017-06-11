<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product_options extends Model
{
   public $table = 'product_options';
   public $timestamps = false;

   public function product()
   {
      return $this->hasOne(product::class );
   }

}
