<?php

use App\Livewire\AuthForm;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard\StudentDashboard;
use App\Livewire\Dashboard\Profile;
use App\Livewire\Dashboard\EnrolledCourses;
use App\Livewire\Dashboard\Reviews;
use App\Livewire\Dashboard\Settings;
use App\Livewire\Dashboard\Attendance;
use App\Livewire\Courses\Index as CourseIndex;
use App\Livewire\Courses\Show as CourseShow;
use App\Livewire\Lessons\Show as LessonShow;
Route::get('/', Home::class)->name('home');
Route::get('/auth', AuthForm::class)->name('auth');
Route::middleware(['guest'])->group(function () {
    Route::get('/dashboard', StudentDashboard::class)->name('dashboard');
    Route::get('/dashboard/profile', Profile::class)->name('dashboard.profile');
    Route::get('/dashboard/enrolled-courses', EnrolledCourses::class)->name('dashboard.enrolled-courses');
    Route::get('/dashboard/reviews', Reviews::class)->name('dashboard.reviews');
    Route::get('/dashboard/settings', Settings::class)->name('dashboard.settings');
    Route::get('/dashboard/attendance', Attendance::class)->name('dashboard.attendance');
});
Route::get('/courses', CourseIndex::class)->name('courses.index');
Route::get('/courses/{course}', CourseShow::class)->name('courses.show');
Route::get('/lessons/{lesson}', LessonShow::class)->name('lessons.show');