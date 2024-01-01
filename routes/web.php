<?php

use App\Http\Controllers\ParentToChildController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/children', [ParentToChildController::class, 'index'])->name('children.index');

    Route::get('/reads', [ReadController::class, 'index'])->name('reads.index');
    Route::view('/reads/create', 'read.create')->name('reads.create');
    Route::post('/reads/create', [ReadController::class, 'store'])->name('reads.store');
    Route::get('/reads/requests', [ReadController::class, 'requests'])->name('reads.requests');
    Route::post('/reads/approve', [ReadController::class, 'approve'])->name('reads.approve');

    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/create/{read_id}', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report/create', [ReportController::class, 'store'])->name('report.store');
    Route::post('/report/approve', [ReportController::class, 'approve'])->name('report.approve');
    Route::get('/reports/{report_id}', [ReportController::class, 'show'])->name('report.show');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
