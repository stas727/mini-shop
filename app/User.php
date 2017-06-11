<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable;

   /*
    * strict->false in config/database
    */

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name', 'email', 'password', 'avatar_id', 'social', 'social_id', 'social_info', 'activated'
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password', 'remember_token',
   ];

   public function review(){
      return $this->hasMany('App\model\ecommerce\review', 'user_id');
   }

   public function getCreatedAtAttribute($value)
   {
      return $this->dateFormat($value);
   }
   function dateFormat($date)
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
