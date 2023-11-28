<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;

use App\Http\Controllers\ProductController;



Route::get('/products', [ProductController::class, 'index'])->name('products.index');


/*
|--------------------------------------------------------------------------
| Web Routes - Comment
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $users = User::all();
    return view('users', ['users' => $users]);
});

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

