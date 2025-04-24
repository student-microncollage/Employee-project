<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeProjectController;

//------------------- REGISTER AND LOGIN CONTROLLER -------------------//
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function (){
 return view('dashboard');})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function(){

//------------------- DASHBORD CONTROLLER -------------------//
Route::get('/all-employees', [DashboardController::class, 'emp'])->name('employees.all');
Route::get('/all-employees/delete/{id}', [DashboardController::class, 'delete'])->name('employees.delete');

Route::get('/all-projects', [DashboardController::class, 'index'])->name('projects.all');
Route::get('/all-projects/delete/{id}', [DashboardController::class, 'deleteproject'])->name('projects.delete');

Route::get('/employees-projects', [DashboardController::class, 'employeesProjects'])->name('employees.projects');
Route::get('/employees-projects/delete/{id}', [DashboardController::class, 'employeedelete'])->name('employees.delete');



//------------------- EMPLOYEE CONTROLLER -------------------//
Route::get('/assign', [EmployeeProjectController::class, 'index'])->name('assign.index');
Route::post('/add-employee', [EmployeeProjectController::class, 'storeEmployee'])->name('employee.store');
Route::post('/add-project', [EmployeeProjectController::class, 'storeProject'])->name('project.store');
Route::post('/assign-projects', [EmployeeProjectController::class, 'assign'])->name('assign.projects');

});
Route::get('/', function () {
    return view('welcome');
});
