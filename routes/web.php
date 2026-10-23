<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services.index')->name('services.index');
Route::get('/projects', fn () => config('site.show_projects') ? view('projects') : abort(404))->name('projects');
Route::view('/privacy-policy', 'legal.privacy')->name('privacy');
Route::view('/terms-and-conditions', 'legal.terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store')->middleware('throttle:5,1');
