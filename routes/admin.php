<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PatientController;

//Dashboard

Route::get ('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

//Gestion de roles
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('patients', PatientController::class);
Route::resource('doctors', App\Http\Controllers\Admin\DoctorController::class);
Route::get('doctors/{doctor}/schedules', [App\Http\Controllers\Admin\DoctorController::class, 'schedules'])->name('doctors.schedules');
Route::resource('appointments', App\Http\Controllers\Admin\AppointmentController::class);
Route::get('appointments/{appointment}/consultation', [App\Http\Controllers\Admin\AppointmentController::class, 'consultation'])->name('appointments.consultation');