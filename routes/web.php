<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');


Route::middleware(['auth'])->group(function () {

    Route::delete('/roles/destroySelected', [RoleController::class, 'destroySelected'])->name('roles.destroySelected');
    Route::patch('/roles/{role}/status', [RoleController::class, 'status'])->name('roles.status');
    Route::resource('/roles', RoleController::class);

    Route::delete('/profiles/{profile}/destroy_role_to_profile', [ProfileController::class, 'destroy_role_to_profile'])->name('profiles.destroy_role_to_profile');
    Route::post('/profiles/{profile}/save_role_to_profile', [ProfileController::class, 'save_role_to_profile'])->name('profiles.save_role_to_profile');
    Route::get('/profiles/{profile}/add_role_to_profile', [ProfileController::class, 'add_role_to_profile'])->name('profiles.add_role_to_profile');
    Route::delete('/profiles/destroySelected', [ProfileController::class, 'destroySelected'])->name('profiles.destroySelected');
    Route::patch('/profiles/{profile}/status', [ProfileController::class, 'status'])->name('profiles.status');
    Route::resource('/profiles', ProfileController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::get('/forgot-password', [LoginController::class, 'password_request'])->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'password_email'])->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'password_reset'])->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'password_update'])->name('password.update');

Route::delete('/users/{user}/destroy_profile_to_user', [UserController::class, 'destroy_profile_to_user'])->name('users.destroy_profile_to_user');
Route::post('/users/{user}/save_profile_to_user', [UserController::class, 'save_profile_to_user'])->name('users.save_profile_to_user');
Route::get('/users/{user}/add_profile_to_user', [UserController::class, 'add_profile_to_user'])->name('users.add_profile_to_user');
Route::delete('/users/destroySelected', [UserController::class, 'destroySelected'])->name('users.destroySelected');
Route::patch('/users/{user}/status', [UserController::class, 'status'])->name('users.status');
Route::resource('/users', UserController::class);

