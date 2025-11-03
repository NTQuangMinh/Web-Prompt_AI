<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AwaitingApprovalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CheckPostController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostUserController;
use App\Http\Controllers\EditProfileController;

Route::prefix('manager')->middleware('auth')->name('manager.')->group(function () {
    Route::resource('accounts', AccountController::class);
    Route::resource('posts', PostController::class);
    Route::get('awaiting-approval', [AwaitingApprovalController::class, 'index'])->name('awaiting.index');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('posts/{id}/check', [CheckPostController::class, 'show'])->name('posts.check');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/posts/create', [PostUserController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostUserController::class, 'store'])->name('posts.store');
});

Route::get('/profile/edit', [EditProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [EditProfileController::class, 'update'])->name('profile.update');

Route::get('/', fn() => redirect()->route('user.home'));