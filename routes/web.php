<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// public page
Route::get('/orders', [OrderController::class, 'userOrderslist'])->name('user.orderlist');
Route::get('/orders/{id}', [OrderController::class, 'userOrderDetails'])->name('user.order.details');
Route::get('/orders/proposal/{id}', [ProposalController::class, 'userSendProposal'])->name('user.order.proposal');
Route::post('/proposal/{id}', [ProposalController::class, 'userProposalStore'])->name('proposal.store');

// Vendor page
Route::middleware(['auth'])->group(function () {
    Route::get('/my-order', [OrderController::class, 'vendorOrderList'])->name('vendor.orderList');
    Route::get('/profile', [ProfileController::class, 'profileView'])->name('vendor.profile');
    Route::get('/my-proposal', [ProposalController::class, 'vendorProposalList'])->name('vendor.proposal');
    Route::post('/my-proposal/remove/{id}', [ProposalController::class, 'removeVendorProposal'])->name('vendor.proposal.remove');
    Route::get('/invoice-form/{id}', [InvoiceController::class, 'invoiceForm'])->name('vendor.invoice.form');
    Route::post('/invoice-submit/{id}', [InvoiceController::class, 'invoiceSubmit'])->name('invoice.submit');
    Route::get('/invoice-view/{id}', [InvoiceController::class, 'invoiceView'])->name('invoice.view');
});


// admin page
Route::middleware(['auth'])->group(function () {

    Route::get('/category', [HomeController::class, 'index'])->name('home');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/Manager-profile', [ProfileController::class, 'ManagerProfileView'])->name('manager.profile');
    Route::get('/orderlist', [OrderController::class, 'orderslist'])->name('orderlist');
    Route::post('/create-order', [OrderController::class, 'createOrder'])->name('create-order-submit');
    Route::get('/orders/details/{id}', [OrderController::class, 'details'])->name('orders.details');
    Route::post('/orders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('orders.delete');
    Route::get('/orders/edit/{id}', [OrderController::class, 'OrderEditForm'])->name('orders.edit');
    Route::post('/orders/update/{id}', [OrderController::class, 'updateOrder'])->name('orders.update');
    Route::get('/orders/form/edit{id}', [OrderController::class, 'OrderEditForms'])->name('orders.form.edit');
    Route::post('/orders/form/edit/update{id}', [OrderController::class, 'OrderEditFormsUpdate'])->name('orders.form.edit.update');
    
    Route::get('/invoicelist', [InvoiceController::class, 'invoices' ])->name('invoicelist');
    Route::get('/invoice-view/{id}', [InvoiceController::class, 'invoiceManagerView' ])->name('manager.invoice.view');
    Route::post('/invoice-payment/{id}', [InvoiceController::class, 'invoicePayment' ])->name('manager.invoice.payment');


    Route::get('/proposallist', [ProposalController::class, 'proposals' ])->name('proposallist');
    Route::post('/proposal-accept/{id}', [ProposalController::class, 'proposalAccept' ])->name('proposal.accept');
    Route::post('/proposal-reject/{id}', [ProposalController::class, 'proposalReject' ])->name('proposal.reject');

    Route::get('/reportlist', [ReportController::class, 'reports' ])->name('reportlist');
});


