<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('companies', CompanyController::class);
//Route::resource('employees', EmployeeController::class);


Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index')->middleware(['auth','all']); 
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create')->middleware(['auth','admin']);
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store')->middleware(['auth','admin']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware(['auth','admin']);
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit')->middleware(['auth','admin']);
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update')->middleware(['auth','admin']);