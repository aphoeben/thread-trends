<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Controllers\ProductController;

// Guest and Authenticated User routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Customer routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('users', ['users' => $users]);
    })->name('dashboard');
});

// Admin routes
Route::group(['middleware' => ['auth:sanctum', 'is_admin']], function () {
    Route::get('/admin', function () {
        // You can return a view for the admin dashboard here
        return view('admin');
    });

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');