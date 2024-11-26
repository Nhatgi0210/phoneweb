<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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


Route::get('/shopping-cart', [CartController::class, 'shopping_cart'])->name('shopping_cart')->middleware('auth');
Route::get('/products',[ProductController::class, 'index']);
Route::get('/brands/{name}', [ProductController::class, 'showProductsByBrandName']);
Route::get('/categories/{name}', [ProductController::class, 'showProductsByCategory'])->name('category.products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search/products', [ProductController::class, 'searchProducts'])->name('search.products');
Route::get('compare',[ProductController::class,'compare'])->name('compare.phone');
Route::get('/appadmin', [AdminController::class, 'appadmin'])->name('appadmin');
Route::get('/admin-thongtin', [AdminController::class, 'admin_thongtin'])->name('admin_thongtin');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin')->middleware('role:admin');
Route::get('/admin_manage_product', [AdminController::class, 'admin_manage_product'])->name('admin_manage_product');
Route::get('/admin_manage_user', [AdminController::class, 'admin_manage_user'])->name('admin_manage_user');
Route::get('/editproduct', [AdminController::class, 'editproduct'])->name('editproduct');
Route::get('/add_product', [AdminController::class, 'add_product'])->name('add_product');

Route::get('/register', [AccountController::class, 'showRegistrationForm'])->name('register')->middleware('notlogin');
Route::post('/register', [AccountController::class, 'register']);

Route::get('/login',[AccountController::class,'showLoginForm'])->name("login")->middleware('notlogin');
Route::post('/login',[AccountController::class,'login']);

Route::get('/logout',[AccountController::class,'logout'])->name('logout');

Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('cart.add')->middleware('auth');


