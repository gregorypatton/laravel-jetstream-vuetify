<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\EtlConfigController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/products', function () {
        return Inertia::render('Products/Index');
    })->name('products.index');
});


Route::prefix('etl-configs')->name('etl_configs.')->group(function () {
    Route::get('/', [EtlConfigController::class, 'index'])->name('index'); // List all configs
    Route::get('/recent', [EtlConfigController::class, 'recent'])->name('recent'); // Recent configs



    Route::get('/download', [EtlConfigController::class, 'downloadAll'])->name('download_all');

    Route::get('/{id}/download', [EtlConfigController::class, 'download'])->name('download');

    Route::get('/create', [EtlConfigController::class, 'create'])->name('create');
    Route::post('/', [EtlConfigController::class, 'store'])->name('store');

    Route::get('/{id}/edit', [EtlConfigController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EtlConfigController::class, 'update'])->name('update');
});
