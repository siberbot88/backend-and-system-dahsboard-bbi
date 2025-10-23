<?php

use App\Http\Controllers\Admin\WorkshopController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('workshop')->group(function () {
    Route::get('/', [WorkshopController::class, 'index'])->name('workshop.index');
    Route::get('/create', [WorkshopController::class, 'create'])->name('workshop.create');
    Route::post('/store', [WorkshopController::class, 'store'])->name('workshop.store');
    Route::get('/{workshop}/edit', [WorkshopController::class, 'edit'])->name('workshop.edit');
    Route::patch('/{workshop}', [WorkshopController::class, 'update'])->name('workshop.update');
})->withoutMiddleware(VerifyCsrfToken::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
});
