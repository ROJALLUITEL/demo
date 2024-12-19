<?php

use App\Http\Controllers\EnvSetupController;
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

Route::middleware('check.installation')->group(function () {
    Route::get('/', [EnvSetupController::class, 'step1'])->name('env.step1');
    Route::post('/step1', [EnvSetupController::class, 'postStep1'])->name('env.postStep1');

    Route::get('/step2', [EnvSetupController::class, 'step2'])->name('env.step2');
    Route::post('/step2', [EnvSetupController::class, 'postStep2'])->name('env.postStep2');

    Route::get('/step3', [EnvSetupController::class, 'step3'])->name('env.step3');
    Route::post('/step3', [EnvSetupController::class, 'postStep3'])->name('env.postStep3');

    Route::get('/step4', [EnvSetupController::class, 'step4'])->name('env.step4');
    Route::post('/step4', [EnvSetupController::class, 'postStep4'])->name('env.postStep4');
});

Route::get('/hello', function () {
    return view('hello');
});
