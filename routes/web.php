<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/vacantes', [VacancyController::class, 'index'])->name('vacancies.index');
    Route::get('/vacantes/crear', [VacancyController::class, 'create'])->name('vacancies.create');
    Route::post('/vacantes', [VacancyController::class, 'store'])->name('vacancies.store');
    Route::delete('/vacantes/{vacancy}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

    Route::post('/vacantes/imagen', [VacancyController::class, 'image'])->name('vacancies.image');
    Route::post('/vacantes/borrarimagen', [VacancyController::class, 'deleteImage'])->name('vacancies.deleteImage');

    Route::post('/vacantes/{vacancy}', [VacancyController::class, 'state'])->name('vacancies.state');

    //Notification
    Route::get('/notificaciones', NotificationController::class)->name('notifications');
});
Route::get('/candidatos/{id}', [CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidatos', [CandidateController::class, 'store'])->name('candidates.store');
Route::get('/vacantes/{vacancy}', [VacancyController::class, 'show'])->name('vacancies.show');
