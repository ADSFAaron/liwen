<?php

use \App\Http\Livewire\Course\MyCourse;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\HomeComponent;
use \App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Student\StudentDashboardComponent;
use App\Http\Livewire\Teacher\TeacherDashboardComponent;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Home Page
Route::get('/', HomeComponent::class)->name('home');

// Contact Us
Route::get('/contact', ContactComponent::class)->name('contact');

// Student
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/student/dashboard', StudentDashboardComponent::class)->name('student.dashboard');
    Route::get('student/course', MyCourse::class)->name('student.course');
});

// Teacher
Route::middleware(['auth:sanctum', 'verified', 'authteacher'])->group(function () {
    Route::get('/teacher/dashboard', TeacherDashboardComponent::class)->name('teacher.dashboard');
});

// Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
