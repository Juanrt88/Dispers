<?php

use App\Category;
use App\Product;
use App\Image;
use App\User;
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
    return view('welcome');

});

Route::get('/prueba', function () {
    
    $productos=App\Product::with('category','images')->orderBy('id','desc')->get();
    return $productos;

});


Route::get('/hombre','Controller@hombre_catagolo');

// Route::get('/ejemplo', function () {
//     return view('/tienda/plantilla-categoria');
// });

/* ------RUTAS QUE YA VAN A QUEDARSE-------- */

/* ----Manejo de usuarios------- */

// Route::get('/admin/usuarios', function () {
//     return view('admin.user.index');
// });

Route::get('/admin/usuarios', 'Admin\AdminUserController@index');

//para obtener todas las rutas del usuario
Route::resource('admin/user','Admin\AdminUserController')->names('admin.user');

/* ----Admin Categoria----- */


Route::get('/admin', function () {
    return view('admin.system.admin_home');
})->name('admin');

Route::get('/admin/acerca_de', function () {
    return view('admin.system.acerca_de');
});


Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');



/* ---Admin Producto----- */
Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');

// Route::get('/admin', function () {
//     return view('plantilla.admin');
// });

Route::get('cancelar/{ruta}', function ($ruta) {
    return redirect()->route($ruta)->with('cancelar','Accion cancelada');
})->name('cancelar');

