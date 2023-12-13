<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;




// Guest and Authenticated User routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Customer routes
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        $products = Product::all(); // Retrieve products data here
        return view('users', ['users' => $users, 'products' => $products]);
    })->name('dashboard');
});

// Admin routes
Route::group(['middleware' => ['auth:sanctum', 'is_admin']], function () {
    Route::get('/admin', function () {
        // You can return a view for the admin dashboard here
        return view('admin');
    });

    Route::get('/category', [ProductController::class, 'show']);
    Route::get('/category/{id}', function ($id) {
        $item = App\Models\Product::where('id', '=', $id)->firstOrFail();
        return view('category.category', compact('item'));
    });
    Route::get('/create-new-category', [ProductController::class, 'create']);
    Route::post('/save-record', [ProductController::class, 'save']);
    Route::post('/submit', [ProductController::class, 'submit']);
    Route::get('/category/edit/{id}', function ($id) {
        $item = App\Models\Product::where('id', '=', $id)->firstOrFail();
        return view('category.edit', compact('item'));
    });
    Route::put('/update-record/{id}', [ProductController::class,  'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('/inventory', [ProductController::class, 'show'])->name('category.index');
    Route::get('/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');
    Route::post('/orders/complete/{id}', [OrderController::class, 'complete'])->name('admin.orders.complete');
    Route::post('/orders/cancel/{id}', [OrderController::class, 'cancel'])->name('admin.orders.cancel');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/men', [ProductController::class, 'showMen']);
Route::get('/women', [ProductController::class, 'showWomen']);
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
Route::post('/cart/update/{id}', [ProductController::class, 'updateCart'])->name('updateCart');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/cart', [ProductController::class, 'showCart'])->name('showCart');
Route::post('/wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/userorders', [OrderController::class, 'userOrders'])->name('userorders');

Route::get('/customer/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/customer/contact', [ContactController::class, 'submitForm'])->name('contact.submit');