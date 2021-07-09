<?php


use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\HomeComponent;
use \App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Student\StudentDashboardComponent;
use App\Http\Livewire\Teacher\TeacherDashboardComponent;
use App\Http\Livewire\Course\MyCourse;
use App\Http\Livewire\Course\CourseList;
use App\Http\Livewire\Course\CourseEnterCategory;
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
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

// Home Page
Route::get('/', HomeComponent::class)->name('home');

// Contact Us
Route::get('/contact', ContactComponent::class)->name('contact');

// Course
Route::middleware(['auth:sanctum', 'verified'])->prefix('course')->name('course.')->group(function () {
    Route::get('/', CourseList::class)->name('course-list');
    Route::get('my-course', MyCourse::class)->name('my-course');
    Route::get('/{category}', CourseEnterCategory::class)->name('course-enter-category');
});

// Student
Route::middleware(['auth:sanctum', 'verified'])->prefix('student')->name('student.')->group(function () {
    Route::get('dashboard', StudentDashboardComponent::class)->name('dashboard');
});

// Teacher
Route::middleware(['auth:sanctum', 'verified', 'authteacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('dashboard', TeacherDashboardComponent::class)->name('dashboard');
});

// Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', AdminDashboardComponent::class)->name('dashboard');
});
