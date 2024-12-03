<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
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
// Route::get('/admin_manage_product', [AdminController::class, 'admin_manage_product'])->name('admin_manage_product');
Route::get('/adminthongtin', [AdminController::class, 'adminthongtin'])->name('adminthongtin');
Route::get('/admin_manage_user', [AdminController::class, 'admin_manage_user'])->name('admin_manage_user');
Route::get('/edit_product', [AdminController::class, 'edit_product'])->name('edit_product');
Route::get('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::post('/add_product', [ProductController::class, 'store'])->name('add_product.store');


Route::put('/edit_product/{id}', [ProductController::class, 'update'])->name('edit_product.update');



// // Route GET để hiển thị form thêm sản phẩm
// Route::get('/add_product', [ProductController::class, 'create'])->name('add_product');

// // Route POST để lưu sản phẩm
// Route::post('/add_product', [ProductController::class, 'store'])->name('add_product');



Route::get('/register', [AccountController::class, 'showRegistrationForm'])->name('register')->middleware('notlogin');
Route::post('/register', [AccountController::class, 'register']);

Route::get('/login',[AccountController::class,'showLoginForm'])->name("login")->middleware('notlogin');
Route::post('/login',[AccountController::class,'login']);

// Route::get('/logout',[AccountController::class,'logout']);
Route::post('/logout', [AccountController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    Route::get('/admin_manage_product', [AdminController::class, 'admin_manage_product'])->name('admin_manage_product');
    Route::get('/admin_duyet', [AdminController::class, 'admin_duyet'])->name('admin_duyet');
Route::get('showsearch',[ProductController::class,'showsearch'])->name('showsearch');
Route::get('/edit_user/{id}', [AdminController::class, 'edit_user'])->name('edit_user');
Route::post('/update_user/{id}', [AdminController::class, 'update_user'])->name('update_user');
Route::post('/update_avatar/{id}', [AdminController::class, 'update_avatar'])->name('update_avatar');
Route::post('/update-user-and-avatar', [AdminController::class, 'updateUserAndAvatar'])->name('update_user_and_avatar');

Route::get('/delete_user', [AdminController::class, 'delete_user'])->name('delete_user');
Route::get('/admin-thongtin2/{id}', [AdminController::class, 'admin_thongtin2'])->name('admin_thongtin2');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::delete('/user/{userId}', [AdminController::class, 'destroy'])->name('user.delete');
Route::get('/admin/users', [AdminController::class, 'adminthongtin'])->name('adminthongtin');
Route::put('/admin/users/{id}/update-position', [AdminController::class, 'updatePosition'])->name('admin.update_position');
Route::post('/add-product', [ProductController::class, 'store'])->name('product.store');
Route::post('/admin/store-product', [ProductController::class, 'store'])->name('storeproduct');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/edit_product/{id}', [AdminController::class, 'edit_product2'])->name('edit_product');
Route::post('/update-product/{id}', [AdminController::class, 'update_product'])->name('update_product.store');
Route::delete('/product/{id}', [ProductController::class, 'delete_product2'])->name('product.delete2');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add')->middleware('auth');
Route::get('/customers', [AdminController::class, 'listCustomers'])->name('customers.list');
Route::get('/customer-list', [AdminController::class, 'listCustomers'])->name('customer.list');
Route::post('/products/{id}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth'); // Chỉ cho phép người dùng đã đăng nhập
    Route::post('/comments/store2', [CommentController::class, 'store2'])->name('comments.store2');
// Route để hiển thị bình luận của sản phẩm
// web.php
Route::get('/product/{id}/comments', [ProductController::class, 'showCmt']);
// Xóa bình luận
// Route xóa bình luận với AJAX
Route::delete('/comment/{comment}', [CommentController::class, 'destroy2'])->name('comments.destroy2');
// routes/web.php
// routes/web.php
// Route::put('product/{id}/update-tag', [ProductController::class, 'updateTag'])->name('product.update_tag');
Route::put('/product/{product}/update-tag', [ProductController::class, 'updateTag'])->name('product.update_tag');
Route::post('/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.quantity');
Route::delete('/delete-on-cart',[CartController::class,'delete'])->name('cart.delete');
Route::get('/order/{order}', [CartController::class, 'show'])->name('order.success');
// Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::post('/order/place', [CartController::class, 'placeOrder'])->name('order.place');// routes/web.php
Route::post('/order/create', [CartController::class, 'createOrder'])->name('order.create');
// Route để khách hàng đặt hàng
// Route::post('/place-order', [CartController::class, 'placeOrder'])->name('order.place');
Route::post('/place-order', [CartController::class, 'placeOrder'])->name('placeOrder');

// Route để admin xem danh sách đơn hàng
Route::get('/admin/orders', [AdminController::class, 'showOrders'])->name('admin.orders');
