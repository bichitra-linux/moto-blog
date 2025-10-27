<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Public blog routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');

    // Admin routes with role middleware
    Route::middleware('role:director')->group(function () {
        // User management (Director only)
        Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.users.show');
        Route::get('/admin/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.destroy');
    });

    Route::middleware('role:editor')->group(function () {
        // Post management (Editor+)
        Route::get('/admin/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/admin/posts/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/admin/posts', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/admin/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.posts.show');
        Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/admin/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/admin/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
