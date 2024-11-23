<?php

use App\Http\Controllers\Auth\Employee\AttendanceController;
use App\Http\Controllers\Auth\Employee\DashboardController;
use App\Http\Controllers\Auth\Employee\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['clear_cache', 'auth_employee'])->prefix('auth/employee')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('employee.dashboard');
        Route::get('/logout', 'logout')->name('employee.logout');
        Route::get('/view-profile', "empProfile")->name('employee.profile');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/currenct-project', 'currentProject')->name('employee.project.current-project');
        Route::post('/project/update-current-project-status', 'updateCurrentProjectStatus')->name('employee.project.update-project-details');
        Route::get('/project/completed-project', 'completedProject')->name('employee.project.completed-project');

    });

    Route::controller(AttendanceController::class)->prefix('attendance')->group(function(){
        Route::get('/mark-attendance', 'markAttendance')->name('employee.attendance.mark-attendance');
        Route::post('/attendance-store', 'attendanceStore')->name('employee.attendance.store');
        Route::get('/history', 'attendanceHistory')->name('employee.attendance.history');
        Route::get('/leave', 'empLeave')->name('employee.attendance.leave');
        Route::get('/leave/apply-leave-form', 'applyLeaveForm')->name('employee.attendance.apply-leave');
        Route::post('/leave/stored-applied-form', 'storedLeaveApplicationForm')->name('employee.attendance.create-leave-application');
        Route::get('/leave/track-application', 'trackApplication')->name('employee.attendance.track-application');
    });

});
