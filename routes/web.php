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
use App\Livewire\Dashboard\DashboardLearningHistory;
use App\Livewire\Lessons\Show as LessonShow;
use App\Livewire\VerifyAccount;
use App\Livewire\ForgotPassword;
use App\Livewire\ResetPassword;
use App\Livewire\Dashboard\TestHistory;

Route::get('/', AuthForm::class)->name('auth');
Route::get('/home', Home::class)->name('home');
Route::get('/auth', AuthForm::class)->name('auth');
Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{token}', ResetPassword::class)->name('reset-password');
Route::middleware(['student.auth'])->group(function () {
    Route::get('/dashboard', StudentDashboard::class)->name('dashboard');
    Route::get('/dashboard/profile', Profile::class)->name('dashboard.profile');
    Route::get('/dashboard/enrolled-courses', EnrolledCourses::class)->name('dashboard.enrolled-courses');
    Route::get('/dashboard/reviews', Reviews::class)->name('dashboard.reviews');
    Route::get('/dashboard/settings', Settings::class)->name('dashboard.settings');
    Route::get('/dashboard/attendance', Attendance::class)->name('dashboard.attendance');
    Route::get('/dashboard/learning-history', DashboardLearningHistory::class)->name('dashboard.learning-history');
    Route::get('/dashboard/test-history', TestHistory::class)->name('dashboard.test-history');
});
Route::get('/courses', CourseIndex::class)->name('courses.index');
Route::get('/courses/{slug}', CourseShow::class)->name('courses.show');
Route::get('/lessons/{lesson}/{lesson_resource_id?}', LessonShow::class)->name('lessons.show');
Route::get('/verify',  VerifyAccount::class)->name('verify');
