<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => \Illuminate\Support\Facades\Config::get('const.ADMIN_URL'), 'middleware' => 'admin'], function () {
   Route::get('/', 'admin\core\products\product_controller@index');
   //products---------------------------------------------------------------------------------
   Route::get('/products', 'admin\core\products\product_controller@index');
   Route::get('/products/edit/{id}' , 'admin\core\products\product_controller@edit');
   Route::get('/product/create' , 'admin\core\products\product_controller@create');
   Route::post('/product/save' , 'admin\core\products\product_controller@store');
   Route::get('/product/edit/{id}' , 'admin\core\products\product_controller@edit')->middleware('checkInt');
   Route::post('/product/delete' , 'admin\core\products\product_controller@destroy')->middleware('requestAjax');

   //-----------------------------------------------------------------------------------------

   //categories-------------------------------------------------------------------------------
   Route::get('/categories', 'admin\core\category\category_controller@index');
   Route::post('/delete/category', 'admin\core\category\category_controller@destroy');
   Route::post('/edit/category', 'admin\core\category\category_controller@update');
   Route::post('/create/category', 'admin\core\category\category_controller@createCategory');
   Route::get('category/edit/{id}', 'admin\core\category\category_controller@edit');
   Route::post('category/update', 'admin\core\category\category_controller@update');
   //-----------------------------------------------------------------------------------------

   //parser-----------------------------------------------------------------------------------
   Route::get('parser', 'admin\core\parser\parser_controller@getCategories');
   Route::get('parser/category', 'admin\core\parser\parser_controller@getProduct');
   //-----------------------------------------------------------------------------------------
});

Route::get('/', 'front\products\product_controller@index')->name('products.index');
Route::get('/product/{id}' , 'front\products\product_controller@show')->middleware('checkInt');
Auth::routes();


