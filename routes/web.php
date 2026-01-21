<?php

use App\Http\Controllers\TutorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TutorController::class, 'index'])->name('home');
Route::get('/tutors/find', [TutorController::class, 'find'])->name('tutors.find');
Route::get('/tutors/apply', [TutorController::class, 'apply'])->name('tutors.apply');
Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');
Route::post('/tutors/{tutor}/request', [TutorController::class, 'request'])->name('tutors.request');
