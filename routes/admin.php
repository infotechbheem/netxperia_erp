<?php

use App\Http\Controllers\Auth\Admin\Client\ClientController;
use App\Http\Controllers\Auth\Admin\Client\CommunicationController;
use App\Http\Controllers\Auth\Admin\Client\HostingController;
use App\Http\Controllers\Auth\Admin\Client\InvoiceController;
use App\Http\Controllers\Auth\Admin\Client\ProjectController as ClientProjectController;
use App\Http\Controllers\Auth\Admin\DashboardController;
use App\Http\Controllers\Auth\Admin\EmployeeController;
use App\Http\Controllers\Auth\Admin\Employee\EmpAttendanceController;
use App\Http\Controllers\Auth\Admin\Employee\LeaveController;
use App\Http\Controllers\Auth\Admin\NoticeController;
use App\Http\Controllers\Auth\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Auth\Admin\Vendor\VendorPaymentController;
use App\Http\Controllers\Auth\Admin\Vendor\VendorProjectController;
use App\Http\Controllers\Auth\Admin\Vendor\VendorRegistration;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

Route::middleware(['clear_cache', 'auth_admin'])->prefix('auth/admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/logout', 'logout')->name('admin.logout');
    });

    Route::controller(AdminProjectController::class)->group(function () {
        // For Project Starting
        Route::get('/project/project-category', 'empProjectCategory')->name('admin.employee.project.project-category');
        Route::post('/project/project-category-create', 'empProjectCategoryCreate')->name('admin.project-category.create');
        Route::get('/project/project-category-delete/{name}', 'empProjectCategoryDelete')->name('admin.project-category.delete');
        Route::get('/project/project-assigned', 'empProject')->name('admin.employee.project');

        Route::get('/project/get-project-details/{id}', 'getProjectDetails');

        Route::get('/project/create-project', 'empCreateItProject')->name('admin.employee.project.create-project');
        Route::post('/project/store-project', 'storeProject')->name('admin.employee.project.store-project');
        Route::get('/project/assign-project', 'allRequestedProject')->name('admin.employee.project.assign-project');
        Route::post('/project/store-assign-project', 'storeAssignProject')->name('admin.employee.assign-project');
        Route::get('/project/project-view/{id}', 'projectView')->name('admin.employee.project.view-project');
        Route::get('/project/department/get-employee', 'getEmployee');

    });

    Route::controller(NoticeController::class)->group(function () {
        Route::get('/notice', 'noticeBoard')->name('admin.notice');
        Route::post('/notices/store', 'storeNotice')->name('admin.notice.store');
    });

    //====================== Employee Area Start ========================//
    Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
        Route::get('/department-designation', 'departmentAndDesignation')->name('admin.employee.department-designation');
        Route::post('/store-department', 'storeDepartment')->name('admin.employee.store-department');
        Route::post('/store-designation', 'storeDesignation')->name('admin.employee.store-designation');
        Route::get('/', 'index')->name('admin.employee');
        Route::get('/registration', 'empRegistration')->name('admin.employee.registration');
        Route::post('/emp-ragistration', 'storeEmpRegistration')->name('admin.employee.registration.store');
        Route::get('/emp-profile/{encryptedId}', 'empProfile')->name('admin.employee.profile');
        Route::get('/performances', 'empPerformance')->name('admin.employee.performance');

    });

    Route::controller(EmpAttendanceController::class)->prefix('employee/attendance')->group(function () {
        Route::get('/', 'addAttendance')->name('admin.employee.attendance.create');
        Route::post('/store', 'storeAttendance')->name('admin.employee.attendance.store');
        Route::get('/view', 'viewAttendance')->name('admin.employee.attendance.view');
        Route::get('/schedule', 'EmpAttendanceSchedule')->name('admin.employee.attendance.schedule');
        Route::post('/schedule-store', 'scheduleStore')->name('admin.employee.attendance.store-schedule');
        Route::put('/schedule-edit/{id}', 'scheduleEdit')->name('admin.employee.attendance.edit-schedule');
        Route::get('/log', 'attendanceLog')->name('admin.employee.attendance.log');
        Route::get('/view-filter-attendance', 'filteredAttendance')->name('admin.employee.attendance.filteredAttendance');
    });

    Route::controller(LeaveController::class)->prefix('employee/attendance/leave')->group(function () {
        Route::get('/leave-request', 'leaveRequest')->name('admin.employee.leave-request');
        Route::get('/leave-details/{id}', 'leaveDetails')->name('admin.employee.leave-details');
        Route::post('/leave-update-status/{id}', 'updateStatus')->name('admin.employee.update-status');
        Route::get('/', 'empLeave')->name('admin.employee.leave');
    });

    //======================= Employee Area End =========================//

    //======================= Client Area Start =========================//

    Route::prefix('client')->group(function () {
        Route::controller(ClientController::class)->group(function () {
            Route::get('/', 'index')->name('admin.client');
            Route::get('/registration', 'registration')->name('admin.client.registration');
            Route::post('/registration-store', 'store')->name('admin.client.store');
            Route::get('/profile/{id}', 'profile')->name('admin.client.profile');
            Route::get('/support-ticket', 'supportTicket')->name('admin.client.support-ticket');
        });

        Route::controller(ClientProjectController::class)->prefix('project')->group(function () {
            Route::get('/requested-project', 'requestedProject')->name('admin.client.project.requested-project');
            Route::get('/current-project', 'currentProject')->name('admin.client.project.current-project');
            Route::get('/view-requested-project/{id}', 'viewRequestedProject')->name('admin.client.project.view-requested-project');
            Route::post('/store-assign-project', 'clientStoreAssignProject')->name('admin.client.assign-project');
            Route::get('/completed-project', 'completedProject')->name('admin.client.project.completed-project');

        });

        Route::controller(InvoiceController::class)->prefix('invoices')->group(function () {
            Route::get('/generate-invoice', 'generateInvoice')->name('admin.client.invoices.generate-invoice');
            Route::get('/project-invoice-generate/{project_id}/{client_id}', 'projectInvoiceGenerate')->name('admin.client.invoices.project-invoice-generate');
            Route::post('/project-invoice-store', 'invoiceStore')->name('admin.client.invoice.store');
            Route::get('/view-project-invoices', 'viewInvoice')->name('admin.client.invoices.view-invoice');
            Route::get('/project-view-invoice/{id}', 'projectViewInvoice')->name('admin.client.invoices.view.project-view-invoice');
        });

        Route::controller(CommunicationController::class)->prefix('communication')->group(function () {
            Route::get('/support-tickets', 'supportTickets')->name('admin.client.communication.support-tickets');
            Route::get('/view-support-ticket/{id}', 'viewSupportTicket')->name('admin.client.communication.view-support-ticket');
            Route::post('/support-ticket-response', 'supportTicketResponseStore')->name('admin.client.communication.support-ticket-response-store');
            Route::post('/change-ticket-status', 'changeTicketStatus')->name('admin.client.communication.change-status');
        });

        Route::controller(HostingController::class)->prefix('hosting')->group(function () {
            Route::get('/hosting-details', 'hostingDetails')->name('admin.client.hosting');
            Route::get('/add-hosting-detials', 'addHostingDetails')->name('admin.client.hosting.add-hosting-details');
            Route::post('/save-hostng-details', 'saveHostingDetails')->name('admin.client.hosting.save-hosting-details');
            Route::post('/renewal-hosting-plan', 'renewalHostingPlan')->name('admin.client.hosting.renew-plans');
            Route::get('/hosting-details-view/{id}', 'viewHostingDetails')->name('admin.client.hosting.hosting-details-view');
        });
    });

    //======================= Client Area End =========================//

    //======================= Vendor Area Start =========================//
    Route::prefix('/vendor')->group(function () {
        Route::controller(VendorRegistration::class)->group(function () {
            Route::get('/', 'index')->name('admin.vendor-profile');
            Route::get('/vendor-profile/{id}', 'vendorProfile')->name('admin.vendor-profile.profile');
            Route::get('/vendor-registration', 'vendorRegistration')->name('admin.vendor.registration');
            Route::post('/store', 'store')->name('admin.vendor.store');
        });

        Route::controller(VendorProjectController::class)->group(function () {
            Route::get('/current-project', 'currentProject')->name('admin.vendor.project.current-project');
            Route::post('/store-assign-project', 'storeAssignProject')->name('admin.vendor.project.store-assign-project');
            Route::get('/assigned-project', 'AssignedProject')->name('admin.vendor.project.assigned-project');
            Route::get('/project/view-assigned-project/{id}', 'getProjectDetails')->name('admin.vendor.project.view-assigned-project');
            Route::get('/project/completed-project', 'completedProject')->name('admin.vendor.project.completed-project');
            Route::get('/project/view-completed-project/{id}', 'viewVendorcompletedProject')->name('admin.vendor.project.view-vendor-completed-project');
        });

        Route::controller(VendorPaymentController::class)->group(function () {
            Route::get('/payments', 'index')->name('admin.vendor.payments');
            Route::get('/payments/view-payment-details/{id}', 'viewPaymentDetails')->name('admin.vendor.payments.view-payment-details');
            Route::get('/payments/get-project-details/{id}', 'projectDetails');
            Route::post('/payments/make-payments', 'makePayment')->name('admin.vendor.payments.store-payments-details');

        });

    });
    //======================= Vendor Area End =========================//

});

Route::get('/get-barcode', function () {
    $generator = new \Picqer\Barcode\BarcodeGeneratorHTML();
    $barcode = $generator->getBarcode('Bheem Kumar Sharma', $generator::TYPE_CODE_128);

    return view('barcode', compact('barcode'));
});
