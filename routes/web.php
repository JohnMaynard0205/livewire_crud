<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Livewire Products CRUD - Main route
    Route::get('/products', function () {
        return view('products.livewire-index');
    })->name('products.index');
    
    // Livewire Product Create - Separate page
    Route::get('/products/create', function () {
        return view('products.livewire-create');
    })->name('products.create');
    
    // Livewire Product Show - Separate page
    Route::get('/products/{id}', function ($id) {
        return view('products.livewire-show', ['productId' => $id]);
    })->name('products.show');
    
    // Livewire Product Edit - Separate page
    Route::get('/products/{id}/edit', function ($id) {
        return view('products.livewire-edit', ['productId' => $id]);
    })->name('products.edit');
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('products.index');
    }
    return redirect()->route('login');
});
