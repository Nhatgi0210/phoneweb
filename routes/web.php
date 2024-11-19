<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// routes/web.php

Route::get("/home", [HomeController::class, 'index'])->name('home');




Route::get('/', function () {
    return redirect()->route('home');

});
// Route::get('/product/{id}')
Route::get('/login',function(){
    return view('login');
});
Route::get('/user', function () {
    return "<h1>this is user page <h1>";
});

Route::get('test',function(){
    return view('test');
});
Route::post('/up-image',[HomeController::class,'upImage'])->name('upload.image');
Route::get('/image',[HomeController::class,'image']);
Route::get('/test2', [HomeController::class, 'test2']);
Route::get('/sosanh', [HomeController::class, 'sosanh'])->name('sosanh');
Route::get('/dangki', [HomeController::class, 'dangki'])->name('dangki');
Route::get('/shopping-cart', [HomeController::class, 'shopping_cart'])->name('shopping_cart');
Route::get('/products',[ProductController::class, 'index']);
Route::get('/brands/{name}', [ProductController::class, 'showProductsByBrandName']);
Route::get('/categories/{name}', [ProductController::class, 'showProductsByCategory'])->name('category.products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


