<?php

use Illuminate\Support\Facades\Route;

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

