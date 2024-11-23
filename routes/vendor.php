<?php

use App\Http\Controllers\Auth\Vendor\CollaborationController;
use App\Http\Controllers\Auth\Vendor\DashboardController;
use App\Http\Controllers\Auth\Vendor\PaymentTrackingController;
use App\Http\Controllers\Auth\Vendor\ProjectAnalyticsReportController;
use App\Http\Controllers\Auth\Vendor\ProjectController;
use App\Http\Controllers\Auth\Vendor\ResourceController;
use App\Http\Controllers\Auth\Vendor\SupportController;
use Illuminate\Support\Facades\Route;

// Route::get('/vendor-dashboard', function () {
//     echo "Vendor Dashboard";
// })->name('vendor.dashboard');

Route::middleware(['clear_cache', 'auth_vendor'])->prefix('auth/vendor')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('vendor.dashboard');
        Route::get('/logout', 'logout')->name('vendor.logout');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/current-project', 'currentProject')->name('vendor.project.current-project');
        Route::post('/project/update-project-details', 'updateProjectDetails')->name('vendor.project.update-project-details');
        Route::get('/project/completed-project', 'completedProject')->name('vendor.project.completed-project');
        Route::get('/project/send-project', 'sendProject')->name('vendor.project.send-project');
        Route::post('/project/store-send-project', 'stoerSendProject')->name('vendor.project.store-send-project');
        Route::get('/project/completed-sended-project', 'completedSendedProject')->name('vendor.project.completed-sended-project');
        Route::get('/project/view-completed-sended-project/{id}', 'viewSendedProject')->name('vendor.project.view-sended-project');
    });

    Route::controller(ResourceController::class)->group(function () {
        Route::get('/resource', 'index')->name('vendor.resources');
    });

    Route::controller(CollaborationController::class)->group(function () {
        Route::get('/collaboration', 'index')->name('vendor.collaborations');
    });

    Route::controller(SupportController::class)->group(function () {
        Route::get('/support', 'index')->name('vendor.support');
    });

    Route::controller(ProjectAnalyticsReportController::class)->group(function () {
        Route::get('/project-analytics-and-report', 'index')->name('vendor.analytics');
    });

    Route::controller(PaymentTrackingController::class)->group(function () {
        Route::get('/payment-tracking', 'index')->name('vendor.payments');
        Route::get('/payment-tracking/record-activity', 'recordActivity')->name('vendor.payments.record-activity');
        Route::get('/payment-tracking/view-payment-details/{id}', 'viewPaymentDetails')->name('vendor.payments.view-payment-details');
    });
});
