<?php

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

// All Boards
Route::get('/', [BoardController::class, 'index']);

// Show Create Form
// Route::get('/boards/create', [BoardController::class, 'create'])->middleware('auth');

// // Store Board
// Route::post('/boards', [BoardController::class, 'store'])->middleware('auth');

// // Show Edit Form
// Route::get('/boards/{board}/edit', [BoardController::class, 'edit'])->middleware('auth');

// // Update Board
// Route::put('/boards/{board}', [BoardController::class, 'update'])->middleware('auth');

// // Delete Board
// Route::delete('/boards/{board}', [BoardController::class, 'destroy'])->middleware('auth');

// // Manage boards
// Route::get('/boards/manage', [BoardController::class, 'manage'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/boards/create', [BoardController::class, 'create']);
    Route::post('/boards', [BoardController::class, 'store']);
    Route::get('/boards/{board}/edit', [BoardController::class, 'edit']);
    Route::put('/boards/{board}', [BoardController::class, 'update']);
    Route::delete('/boards/{board}', [BoardController::class, 'destroy']);
    Route::get('/boards/manage', [BoardController::class, 'manage']);
});

// Single Board
Route::get('/boards/{board}', [BoardController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);