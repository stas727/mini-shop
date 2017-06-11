<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $desc = \App\models\category_descriptions::create([
         'category' => 'category12'
      ]);
          \App\models\category::create([
         'category_description_id' => $desc->id
      ]);

      factory(\App\models\product_options::class, 30)->create();
      factory(\App\models\product::class, 30)->create();


      $this->command->info('successfully seed new products and options');

   }
}
