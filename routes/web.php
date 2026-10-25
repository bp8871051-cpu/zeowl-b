<?php

use App\Http\Controllers\AdminWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/dashboard', [AdminWebController::class, 'index'])->name('admin.dashboard');
Route::post('/admin/contacts/{id}/status', [AdminWebController::class, 'updateContactStatus'])->name('admin.contacts.status');
