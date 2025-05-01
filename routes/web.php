<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Protected routes (require login)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Assessment routes
    Route::get('/assessments', [AssessmentController::class, 'showTypes'])->name('assessment.types');
    Route::get('/assessment/history', [AssessmentController::class, 'history'])->name('assessment.history');
    Route::get('/assessment/{assessment}/result', [AssessmentController::class, 'result'])->name('assessment.result');
    Route::get('/assessment/{type}', [AssessmentController::class, 'index'])->name('assessment.index');
    Route::post('/assessment/{type}', [AssessmentController::class, 'store'])->name('assessment.store');
    
    // Support resources
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    
    // About us page
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
});
