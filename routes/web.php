<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SMKPController;
use App\Http\Controllers\AuditController;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
  Route::resource('users', UserController::class);
  Route::resource('supports', SupportController::class);
  Route::resource('smkp', SMKPController::class);
  Route::resource('audits', AuditController::class);
});
