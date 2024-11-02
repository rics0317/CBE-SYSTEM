<?php


use App\Http\Middleware\EnsureStudent; 
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.update-image');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware([EnsureStudent::class])->group(function () {
Route::get('/student/appointments/calendar', [AppointmentController::class, 'calendar'])->name('student.appointments.calendar');
Route::post('/student/appointments/book', [AppointmentController::class, 'book'])->name('appointments.book');
Route::get('/appointments/{teacherId}', [AppointmentController::class, 'getAppointmentsByTeacher'])->name('appointments.byTeacher');
});
require __DIR__.'/auth.php';
