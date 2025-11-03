<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PromtController;  // Đổi từ Post
use App\Http\Controllers\AwaitingApprovalController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CheckPostController;  // Giữ, nhưng dùng Promt trong controller
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\PostUserController;  // Đổi thành PromtUserController nếu cần
use App\Http\Controllers\EditProfileController;

Route::prefix('manager')->middleware('auth')->name('manager.')->group(function () {
    Route::resource('accounts', AccountController::class);
    // Route::resource('promts', PromtController::class); 
    Route::get('awaiting-approval', [AwaitingApprovalController::class, 'index'])->name('awaiting.index');
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('promts/{id}/check', [CheckPostController::class, 'show'])->name('promts.check');  // Đổi
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/promts/create', [PostUserController::class, 'create'])->name('promts.create');  // Đổi
    Route::post('/promts', [PostUserController::class, 'store'])->name('promts.store');  // Đổi
});

Route::get('/profile/edit', [EditProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [EditProfileController::class, 'update'])->name('profile.update');

Route::get('/', fn() => redirect()->route('user.home'));