<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductRequestController;
use Illuminate\Support\Facades\Route;

// Rotas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vendedores', [SellerController::class, 'index'])->name('sellers.index');
Route::get('/como-funciona', [PageController::class, 'howItWorks'])->name('how-it-works');

// Rotas de autenticação
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    Route::get('/encomendas', [OrderController::class, 'index'])->name('orders.index');
    
    // Rotas para solicitação de produtos
    Route::get('/produtos', [ProductRequestController::class, 'index'])->name('product-requests.index');
    Route::get('/produtos/solicitar', [ProductRequestController::class, 'create'])->name('product-requests.create');
    Route::post('/produtos/solicitar', [ProductRequestController::class, 'store'])->name('product-requests.store');

    // Rotas para avaliações
    Route::get('/avaliacoes', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/colaboradores/{contributor}/avaliacoes', [ReviewController::class, 'index'])->name('reviews.contributor');
    Route::get('/colaboradores/{contributor}/avaliar', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/avaliacoes', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/contribuinte/dashboard', [ContributorController::class, 'dashboard'])->name('contributor.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Rotas protegidas para admin
// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

// Rotas protegidas para contribuintes
// Route::middleware(['auth', 'contributor'])->group(function () {
//     Route::get('/contribuinte/dashboard', [ContributorController::class, 'dashboard'])->name('contributor.dashboard');
// });