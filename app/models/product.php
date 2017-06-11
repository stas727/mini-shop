<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class product extends Model
{

   use SearchableTrait;

   protected $searchable = [
      /**
       * Columns and their priority in search results.
       * Columns with higher values are more important.
       * Columns with equal values have equal importance.
       *
       * @var array
       */
      'columns' => [
         'products.name' => 10,
         'products.description' => 10,
      ]
   ];

   public $fillable = ['name', 'description', 'price', 'image', 'category_id', 'option_id'];
   public $timestamps = true;

   public function options()
   {
      return $this->belongsTo(product_options::class, 'option_id');
   }

   public function category()
   {
      return $this->belongsTo(category::class);
   }
   public function getCreatedAtAttribute($value)
   {
      return $this->attributes['created_at'] = $this->dateFormat($value);
   }
   public function getImageAttribute($value){
     $res  =  explode('/' , $value);
      if(in_array('http:' , $res)){
         return $this->attributes['image'] = $value;
      }
      return $this->attributes['image'] = url('images/' . $value);

   }
   public  function dateFormat($date)
   {
      $date = \Carbon\Carbon::parse($date);
      $now = \Carbon\Carbon::now();


      $plural = function($number, $one, $two, $five) {
         if (($number - $number % 10) % 100 != 10) {
            if ($number % 10 == 1) {
               $result = $one;
            } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
               $result = $two;
            } else {
               $result = $five;
            }
         } else {
            $result = $five;
         }
         return $result;
      };
      $res = $date->diffInYears($now);
      if ($res == 0) {

         $res = $date->diffInMonths($now);
         if ($res == 0) {
            $res = $date->diffInDays($now);
            if ($res == 0) {
               $res = $date->diffInHours($now);
               if ($res == 0) {
                  $res = $date->diffInMinutes($now);
                  return $res . " " .$plural($res, "минуту назад", "минуты назад", "минут назад");
               } else {
                  return $res . " " .$plural($res, "час назад", "часа назад", "часов назад");
               }
            } else {
               return $res . " " .$plural($res, "день назад", "дня назад", "дней назад");
            }
         } else {
            return $res . " " .$plural($res, "месяц назад", "месца назад", "месцев назад");
         }
      } else {
         return $res . " " .$plural($res, "год назад", "года назад", "лет назад");
      }
   }
}
