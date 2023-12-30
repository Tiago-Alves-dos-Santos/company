<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CustomerCompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamMemberController;
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
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/tag', [TagController::class, 'index'])->name('tag');
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/profile-information', [UserController::class, 'profileInformation'])->name('user.profile-information');
    Route::get('/admin', [AdminController::class, 'index'])->middleware('admin_level:first')->name('admin.index');

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
        Route::get('/create', [ProjectController::class, 'viewCreate'])->name('project.viewCreate');
        Route::get('/update/{project}', [ProjectController::class, 'viewUpdate'])->name('project.viewUpdate');
    });
    Route::prefix('/customer-company')->group(function () {
        Route::get('/', [CustomerCompanyController::class, 'index'])->name('customer_company.index');
        Route::get('/create', [CustomerCompanyController::class, 'viewCreate'])->name('customer_company.viewCreate');
        Route::get('/update/{customer}', [CustomerCompanyController::class, 'viewUpdate'])->name('customer_company.viewUpdate');
    });
    Route::prefix('/team-members')->group(function () {
        Route::get('/', [TeamMemberController::class, 'index'])->name('team_member.index');
        Route::get('/create', [TeamMemberController::class, 'viewCreate'])->name('team_member.viewCreate');
        Route::get('/update/{member}', [TeamMemberController::class, 'viewUpdate'])->name('team_member.viewUpdate');
    });
    Route::prefix('/depoiment')->group(function () {
        Route::get('/', [ClientController::class, 'viewFeedbacks'])->name('feedback.viewFeedbacks');
    });
});

Route::prefix('/client')->group(function () {
    Route::post('/login', [ClientController::class, 'login'])->name('client.login');
    Route::get('/auth/facebook/callback', [ClientController::class, 'getToken'])->name('client.getToken');
    Route::post('/depoiment', [ClientController::class, 'depoiment'])->name('client.depoiment');
    Route::post('/sendContact', [ClientController::class, 'sendContact'])->name('client.sendContact');
});
