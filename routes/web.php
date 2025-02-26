<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\PackageController;

//home page
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/track', [HomeController::class, 'track'])->name('track');
Route::get('/how-to', [HomeController::class, 'how'])->name('how');
Route::get('/destinations', [HomeController::class, 'destinations'])->name('destinations');
Route::match(['get', 'post'], 'package', [HomeController::class, 'viewPackage'])->name('package');


Route::get('login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('admin.login');


Route::get('/home', [AdminController::class, 'index'])->name('home');
// Route for changing email user
Route::get('/send/email', [AdminController::class, 'sendEmailPage'])->name('send.email');
Route::post('/send/email', [AdminController::class, 'sendUserEmail'])->name('send.mail');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');


Route::get('/packages', [PackageController::class, 'index'])->name('admin.packages');
Route::get('/packages/create', [PackageController::class, 'create'])->name('admin.packages.create');
Route::post('/packages/store', [PackageController::class, 'store'])->name('admin.packages.store');
Route::get('/package/{id}', [PackageController::class, 'view'])->name('admin.package.view');
Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('admin.packages.edit');
Route::put('/admin/packages/{package}', [PackageController::class, 'update'])->name('admin.packages.update');
Route::post('/packages/{id}/delete', [PackageController::class, 'destroy'])->name('admin.packages.delete');
