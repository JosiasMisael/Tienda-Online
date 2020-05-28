<?php

use App\Category;
use App\Image;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Route;




//Pruebas
Route::get('/prueba', function () {
  //16 Eliminar un imagen

  $product= Product::with('images')->find(3);
  return $product;

});

//Mostrar Resultados
Route::get('/resultado', function () {

    $image = Image::orderBy('id','DESC')->get();
    return $image;
});







Route::get('/', function () {
    return view('tienda.index');
  });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
Route::get('/admin', function () {
     return view('plantilla.admin');
  })->name('admin');


Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');

Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar','¡Acción Cancelada!');
})->name('cancelar');

});

