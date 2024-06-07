<?php

// uuse App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
    'prefix' => 'categories'
  ], function() {
    Route::get('/', [CategoryController::class, 'index']);

    Route::get('/create', [CategoryController::class, 'create'])->name('create-category');
    Route::post('/store', [CategoryController::class, 'store'])->name('store-category');

     
    Route::get('/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/update/{id}', [CategoryController::class, 'update']);

    Route::get('/delete/{id}', [CategoryController::class, 'destroy']);

  
  });

