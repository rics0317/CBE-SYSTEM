<?php


use App\Http\Middleware\EnsureStudent; 
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
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

// Officer Routes
Route::get('/officer/login', [OfficerController::class, 'login'])->name('officer.login');
Route::post('/officer/authenticate', [OfficerController::class, 'authenticate'])->name('officer.authenticate');

// Protected Officer Routes
Route::middleware(['auth', 'check.officer.role'])->group(function () {
    Route::get('/officer/dashboard', [OfficerController::class, 'dashboard'])->name('officer.dashboard');
    Route::post('/officer/logout', [OfficerController::class, 'logout'])->name('officer.logout');
});

// Enrollment Routes
Route::get('/enrollment', [EnrollmentController::class, 'index'])->name('enrollment.index');
Route::get('/enrollment/create', [EnrollmentController::class, 'create'])->name('enrollment.create');
Route::post('/enrollment', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::get('/enrollment/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollment.show');
Route::get('/enrollment/{enrollment}/edit', [EnrollmentController::class, 'edit'])->name('enrollment.edit');
Route::put('/enrollment/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollment.update');
Route::delete('/enrollment/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');

// Override the default login routes
Route::get('login', [StudentLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [StudentLoginController::class, 'login']);

// Protected student routes
Route::middleware(['auth', 'check.student.role'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Add other student-specific routes here
});

require __DIR__.'/auth.php';
