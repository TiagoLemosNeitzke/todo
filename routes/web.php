<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMembersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/teams', TeamController::class )->except(['show', 'edit', 'update']);
    Route::post('/memberForm', [TeamMembersController::class, 'addMemberForm'])->name('memberForm');
    Route::post('/removeMemberForm', [TeamMembersController::class, 'removeMemberForm'])->name('removeMemberForm');
    Route::post('/addMember', [TeamMembersController::class, 'addMember'])->name('addMember');
    Route::post('/removeMember', [TeamMembersController::class, 'removeMember'])->name('removeMember');
    Route::resource('/tasks', TaskController::class)->except(['show', 'edit', 'update'])->except('index', 'show', 'edit', 'update');
});

require __DIR__.'/auth.php';
