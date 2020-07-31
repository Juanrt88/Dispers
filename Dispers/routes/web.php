<?php

use App\Category;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\Auth;
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

//pruebas con imagenes
Route::get('/', function () {
 
  
    return view('welcome');
});

Auth::routes();
Route::get('/home','HomeController@index')->name('home');





/*
Route::get('/admin', function () {
    return view('tienda.admin');
})->name('admin');

*/
Route::get('/admin', function () {
    return view('admin.system.admin_home');
})->name('admin');

Route::get('/admin/acerca_de', function () {
    return view('admin.system.acerca_de');
});





Route::get('/tienda', function () {
    return view('tienda.usuario.perfil');
});





Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');

Route::get('cancelar/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar','Acción Cancelada!');
})->name('cancelar');