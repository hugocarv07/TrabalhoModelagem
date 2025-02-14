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
use App\Http\Controllers\OrderProposalController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

// Rotas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/vendedores', [SellerController::class, 'index'])->name('sellers.index'); // ✅ Lista de vendedores
Route::get('/vendedores/{seller}', [SellerController::class, 'show'])->name('sellers.show'); // ✅ Perfil do vendedor
// Route::get('/perfil/{user}', [UserController::class, 'show'])->name('users.show');


Route::get('/como-funciona', [PageController::class, 'howItWorks'])->name('how-it-works');

// Rotas de autenticação
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    // 🔹 Clientes veem apenas suas encomendas
    Route::get('/encomendas', [ProductRequestController::class, 'myOrders'])->name('product-requests.myOrders');

    // 🔹 Admins veem todas as encomendas do site
    Route::middleware('admin')->get('/pedidos', [ProductRequestController::class, 'allOrders'])->name('product-requests.allOrders');
});


// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    
    // Rotas para solicitação de produtos
    Route::get('/produtos', [ProductRequestController::class, 'index'])->name('product-requests.index');
    Route::get('/produtos/solicitar', [ProductRequestController::class, 'create'])->name('product-requests.create');
    Route::post('/produtos/solicitar', [ProductRequestController::class, 'store'])->name('product-requests.store');

// Nova rota para exibir detalhes da solicitação
Route::get('/produtos/{id}', [ProductRequestController::class, 'show'])->name('product-requests.show');

// Nova rota para cancelar (excluir) uma solicitação
Route::delete('/produtos/{id}', [ProductRequestController::class, 'destroy'])->name('product-requests.destroy');

});

Route::middleware('auth')->group(function () {
    Route::post('/propostas/{productRequest}', [OrderProposalController::class, 'store'])->name('proposals.store');
    Route::patch('/propostas/{id}/aceitar', [OrderProposalController::class, 'accept'])->name('proposals.accept');
    Route::patch('/propostas/{id}/rejeitar', [OrderProposalController::class, 'reject'])->name('proposals.reject');
});

// Rota para que qualquer usuário possa ver todas as avaliações
Route::middleware(['auth'])->group(function () {
    Route::get('/avaliacoes', [ReviewController::class, 'contributorList'])->name('reviews.list');
    Route::get('/avaliacoes/{contributor}/avaliar', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/avaliacoes', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/sellers/{id}/approve', [AdminController::class, 'approveSeller'])->name('sellers.approve');
    Route::delete('/admin/sellers/{id}/reject', [AdminController::class, 'rejectSeller'])->name('sellers.reject');
});

// Rotas protegidas para contribuintes
// Route::middleware(['auth', 'contributor'])->group(function () {
//     Route::get('/contribuinte/dashboard', [ContributorController::class, 'dashboard'])->name('contributor.dashboard');
// });