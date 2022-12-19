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

#Companies Route
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index')->middleware(['auth','all']); 
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create')->middleware(['auth','admin']);
Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store')->middleware(['auth','admin']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware(['auth','admin']);
Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit')->middleware(['auth','admin']);
Route::get('/companies/{company}/show', [CompanyController::class, 'show'])->name('companies.show')->middleware(['auth','all']);
Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update')->middleware(['auth','admin']);

#Employee Route
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index')->middleware(['auth','all']); 
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create')->middleware(['auth','admin']);
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store')->middleware(['auth','admin']);
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy')->middleware(['auth','admin']);
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit')->middleware(['auth','admin']);
Route::get('/employees/{employee}/show', [EmployeeController::class, 'show'])->name('employees.show')->middleware(['auth','all']);
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update')->middleware(['auth','admin']);