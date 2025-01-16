<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Evaluations\EvaluationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\User\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//user rotues


Route::get('/', [DashboardController::class,'index'])->name('home');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //chekcout 
    Route::prefix('checkout')->controller(CheckoutController::class)->group((function()  {
        Route::post('order','store')->name('checkout.store');
        Route::get('success','success')->name('checkout.success');
        Route::get('cancel','cancel')->name('checkout.cancel');
    }));

    Route::middleware(['checkrole:admin,user'])->group(function () {
        Route::get('/examenes', [EvaluationController::class, 'index'])->name('evaluations.index');
        Route::get('/examenes/quiz', [EvaluationController::class, 'quiz'])->name('evaluations.quiz');
        Route::post('/examenes/quiz/crear', [EvaluationController::class, 'store'])->name('evaluations.quiz.store');
        Route::delete('/examenes/eliminar/{evaluation_id}', [EvaluationController::class, 'destroy'])->name('evaluations.delete');
       
        Route::get('/interpretacion', function () {
            return Inertia::render('Interpretation/Interpretation');
        })->name('interpretation');

        Route::get('/examenes/exportar/unitatio/{evaluation_id}', [EvaluationController::class, 'export'])->name('evaluations.export');
        Route::get('/examenes/exportar/excel/{evaluation_id}', [EvaluationController::class, 'exportExcel'])->name('evaluations.export.excel');
    });

    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/examenes/admin', [EvaluationController::class, 'indexAdmin'])->name('evaluations.index.admin');
        Route::get('/examenes/exportar/excel/masivo/get', [EvaluationController::class, 'exportMassiveExcel'])->name('evaluations.export.excel.masive');        
        Route::get('/examenes/exportar/masivo', [EvaluationController::class, 'export_masive'])->name('evaluations.export.masive');
    });
});

//add to cart 

Route::prefix('cart')->controller(CartController::class)->group(function () {
    Route::get('view','view')->name('cart.view');
    Route::post('store/{product}','store')->name('cart.store');
    Route::patch('update/{product}','update')->name('cart.update');
    Route::delete('delete/{product}','delete')->name('cart.delete');
});

//routes for products list and filter 
Route::prefix('products')->controller(ProductListController::class)->group(function ()  {
    Route::get('/','index')->name('products.index');
    
});



//end

//admin routs

Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::middleware(['checkrole:user'])->group(function () {
    });

    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
    //products routes 
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/store',[ProductController::class,'store'])->name('admin.products.store');
    Route::put('/products/update/{id}',[ProductController::class,'update'])->name('admin.products.update');
    Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('admin.products.image.delete');
    Route::delete('/products/destory/{id}',[ProductController::class,'destory'])->name('admin.products.destory');
    
});

//end

require __DIR__ . '/auth.php';
