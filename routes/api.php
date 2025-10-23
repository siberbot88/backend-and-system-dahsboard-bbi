<?php

use App\Http\Controllers\Admin\WorkshopController;
use App\Http\Controllers\Api\Owner\WorkshopOwnerController;
use App\Http\Controllers\Api\Technician\WorkshopTechnicianController;
use Illuminate\Support\Facades\Route;


// routes/api.php
Route::prefix('workshops')->group(function () {

    Route::get('/', [WorkshopController::class, 'index'])->name('api.workshops.index');
    Route::get('{workshop}', [WorkshopController::class, 'show'])->name('api.workshops.show');
    Route::post('/', [WorkshopController::class, 'store'])->name('api.workshops.store');
    Route::match(['put', 'patch'], '{workshop}', [WorkshopController::class, 'update'])->name('api.workshops.update');
    Route::delete('{workshop}', [WorkshopController::class, 'destroy'])->name('api.workshops.destroy');
});

Route::prefix('api/v1')->group(function () {
    Route::prefix('owner')->middleware('auth:sanctum')->group(function () {
        Route::get('workshops', [WorkshopOwnerController::class, 'index']);
        Route::post('workshops', [WorkshopOwnerController::class, 'store']);
        Route::put('workshops/{workshop}', [WorkshopOwnerController::class, 'update']);
    });

    Route::prefix('technician')->middleware('auth:sanctum')->group(function () {
        Route::get('workshops/{workshop}', [WorkshopTechnicianController::class, 'show']);
    });
});

