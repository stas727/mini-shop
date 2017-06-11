<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\models\product::class, function (Faker\Generator $faker) {
   return [
      'name' => $faker->unique()->name,
      'description' => $faker->paragraph(),
      'url' => $faker->url,
      'price' => rand(10, 10000),
      'image' => $faker->imageUrl($width = 640, $height = 480),
      'category_id' => \App\models\category::all()->random()->id,
      'option_id' => \App\models\product_options::all()->random()->id
   ];
});
$factory->define(\App\models\product_options::class, function (Faker\Generator $faker) {
   return [
      'ram' => $faker->numberBetween(2, 32),
      'storage' => $faker->numberBetween(100, 10000),
      'operation_system' => $faker->randomElement(['android' ,'ios'])
   ];
});

