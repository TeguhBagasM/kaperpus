<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', [PublicController::class, 'index']);

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'regisProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [UserController::class, 'profile']);

    Route::get('books', [BookController::class, 'index']);
    Route::get('book-add', [BookController::class, 'create']);
    Route::post('create-book', [BookController::class, 'store']);
    Route::get('book-edit/{slug}', [BookController::class, 'edit']);
    Route::put('book-edit/{slug}', [BookController::class, 'update']);
    Route::get('book-delete/{slug}', [BookController::class, 'delete']);
    Route::get('book-deleted-list', [BookController::class, 'trashedBooks']);
    Route::get('book-restore/{slug}', [BookController::class, 'restoreBook']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-add', [CategoryController::class, 'create']);
    Route::post('create-category', [CategoryController::class, 'store']);
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
    Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
    Route::get('category-deleted-list', [CategoryController::class, 'trashedCategories']);
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('user-add', [UserController::class, 'create']);
    Route::post('create-user', [UserController::class, 'store']);
    Route::get('user-edit/{slug}', [UserController::class, 'edit']);
    Route::put('user-edit/{slug}', [UserController::class, 'update']);
    Route::get('user-delete/{slug}', [UserController::class, 'delete']);
    Route::get('user-banned-list', [UserController::class, 'trashedUsers']);
    Route::get('user-restore/{slug}', [UserController::class, 'restoreUser']);
    Route::get('registered-user', [UserController::class, 'registeredUser']);
    Route::get('user-detail/{slug}', [UserController::class, 'show']);
    Route::get('user-approve/{slug}', [UserController::class, 'approve']);
    // Route::get('user-banned/{slug}', [UserController::class, 'banned']);
    Route::get('loans', [LoanController::class, 'index']);
    Route::get('loan', [LoanController::class, 'loan']);
    Route::post('loans', [LoanController::class, 'store']);
    
    Route::get('return-book', [LoanController::class, 'return']);
    Route::post('return-book', [LoanController::class, 'returnBook']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
