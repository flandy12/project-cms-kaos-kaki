<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'labels'    => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
            'product'   => [5, 10, 3, 12, 8, 11, 6, 10, 14, 7],
            'resources' => [3, 6, 2, 7, 4, 6, 3, 7, 8, 4],
            'values' => [120, 200, 150, 300, 250]
        ]);
    })->name('dashboard');

    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('permissions', PermissionController::class);

    Route::resource('product', ProductController::class);

    Route::get('/report', [ProductController::class, 'report'])->name('report');
});
