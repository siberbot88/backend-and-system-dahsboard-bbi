<?php

use App\Http\Controllers\Admin\WorkshopController;
use App\Http\Controllers\Api\Owner\WorkshopOwnerController;
use App\Http\Controllers\Api\Technician\WorkshopTechnicianController;
use Illuminate\Support\Facades\Route;


// routes/api.php
Route::prefix('workshops')->group(function () {

    // GET /api/workshops → semua data
    Route::get('/', [WorkshopController::class, 'index'])->name('api.workshops.index');

    // GET /api/workshops/{id} → detail 1 workshop
    Route::get('{id}', [WorkshopController::class, 'show'])->name('api.workshops.show');

    // POST /api/workshops → simpan data baru
    Route::post('/', [WorkshopController::class, 'store'])->name('api.workshops.store');

    // PUT/PATCH /api/workshops/{id} → update data
    Route::match(['put', 'patch'], '{id}', [WorkshopController::class, 'update'])->name('api.workshops.update');

    // DELETE /api/workshops/{id} → hapus 1 data
    Route::delete('{id}', [WorkshopController::class, 'destroy'])->name('api.workshops.destroy');

    // DELETE /api/workshops/delete-selected → hapus banyak data sekaligus
    Route::delete('delete-selected', [WorkshopController::class, 'destroySelected'])->name('api.workshops.destroy.selected');
});

Route::prefix('api/v1')->group(function () {
    Route::prefix('owner')->middleware('auth:sanctum')->group(function () {
        Route::get('workshops', [WorkshopOwnerController::class, 'index']);
        Route::post('workshops', [WorkshopOwnerController::class, 'store']);
        Route::put('workshops/{id}', [WorkshopOwnerController::class, 'update']);
    });

    Route::prefix('technician')->middleware('auth:sanctum')->group(function () {
        Route::get('workshops/{id}', [WorkshopTechnicianController::class, 'show']);
    });
});

