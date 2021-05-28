<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuth\AdminLoginController;
use App\Http\Controllers\AdminAuth\AdminRegisterController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/admin',
        'as'=> 'admin.',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
    //home
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    //auth
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/register', [AdminRegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminRegisterController::class, 'register'])->name('register.submit');
    //roles
    Route::resource('roles', RoleController::class);
    Route::get('/roles/{role}/assign/permissions', [RoleController::class, 'assignPermissions'])->name('roles.assign');
    Route::post('/roles/{role}/assign/permissions', [RoleController::class, 'assignPermissionsPost'])->name('roles.assign.post');
    //permissions
    Route::resource('permissions', PermissionController::class);
});
