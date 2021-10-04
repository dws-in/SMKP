<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SMKPController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserReportController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('supports', SupportController::class);
Route::resource('smkp', SMKPController::class);
Route::resource('audits', AuditController::class);
Route::resource('report', ReportController::class);
Route::resource('result', UserReportController::class);

Route::group(['middleware' => 'auth'], function () {

});
