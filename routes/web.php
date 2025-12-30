<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::get('/about', )->name('about');
Route::get('/projects', )->name('projects');
Route::get('/experience', )->name('experience');
Route::get('/contact', )->name('contact');
Route::get('/admin', )->name('admin');