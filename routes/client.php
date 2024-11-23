<?php

use App\Http\Controllers\Auth\Client\CommunicationController;
use App\Http\Controllers\Auth\Client\DashboardController;
use App\Http\Controllers\Auth\Client\InvoiceController;
use App\Http\Controllers\Auth\Client\ProjectController;
use Illuminate\Support\Facades\Route;

Route::middleware(['clear_cache', 'auth_client'])->prefix('auth/client')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('client.dashboard');
        Route::get('/logout', 'logout')->name('client.logout');
    });

    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project/current-project', 'currentProject')->name('client.project.current-project');
        Route::get('/project/create-new-project', 'createNewProject')->name('client.project.create-project');
        Route::post('/project/store-project', 'projectStore')->name('client.project.store');
        Route::get('/project/completed-project', 'completedProject')->name('client.project.completed-project');

    });

    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/view-invoice', 'viewInvoice')->name('client.invoice.view-invoice');
        Route::get('/invoice/payment-history', 'paymentHistory')->name('client.invoice.payment-history');
        Route::get('/invoice/generate-invoice', 'generateInvoice')->name('client.invoice.generate-invoice');
        Route::get('/invoice/view-project-invoice/{id}', 'viewProjectInvoice')->name('client.invoice.view-project-invoice');
        Route::get('/invoice/download-invoice/{id}', 'downloadInvoice')->name('client.invoice.download-invoice');
    });

    Route::controller(CommunicationController::class)->group(function () {
        Route::get('/communication/support-tickets', 'supportTickets')->name('client.communication.support-tickets');
        Route::get('/communication/contact-support', 'contactSupport')->name('client.communication.contact-support');
        Route::post('/communication/support-ticket-store', 'supportTicketStore')->name('client.communication.support-ticket-store');
        Route::get('/communication/view-support-ticket/{id}', 'viewSupportTicket')->name('client.communication.view-support-ticket');
        Route::post('/communication/store-support-ticket', 'chatSupportTicketStore')->name('client.communication.chat-support-ticket-store');
    });

});
