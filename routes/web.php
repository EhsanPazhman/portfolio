<?php

use App\Livewire\Web\Home;
use App\Livewire\Admin\Users;
use App\Livewire\Admin\Skills;
use App\Livewire\Admin\Contacts;
use App\Livewire\Admin\Projects;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Experiences;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/projects', Projects::class)->name('admin.projects');
    Route::get('/experiences', Experiences::class)->name('admin.experiences');
    Route::get('/skills', Skills::class)->name('admin.skills');
    Route::get('/contacts', Contacts::class)->name('admin.contacts');
});
