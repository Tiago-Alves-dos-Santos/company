<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebSiteController;
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

Route::get('/', [WebSiteController::class,'index'])->name('website');


//administrator routes users(admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/tag', [TagController::class, 'index'])->name('tag');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/profile-information', [UserController::class, 'profileInformation'])->name('user.profile-information');

    Route::prefix('/content')->group(function () {
        Route::post('/saveJson', [ContentController::class, 'saveJson'])->name('content.saveJson');
    });
    Route::prefix('/services')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/create', [ServiceController::class, 'viewCreate'])->name('services.viewCreate');
        Route::get('/update/{service}', [ServiceController::class, 'viewUpdate'])->name('services.viewUpdate');
    });
    Route::prefix('/projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project.index');
    });
});

