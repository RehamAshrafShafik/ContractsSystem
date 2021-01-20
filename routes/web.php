<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddLandController;
use App\Http\Controllers\AddAgentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\BlockTableController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\ContractListController;

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
Route::group(['middleware'=>'web'], function(){
Route::get('/', function () {
    return view('Pages.Home');
})->name('login');
Route::get('/signedout', [AdminController::class, 'logout'])->name('logout');


    Route::post('/Admin', [AdminController::class, 'login'])->name('Logina');
    Route::get('/Home', [AdminHomeController::class, 'home'])->name('Home');
    Route::get('/Admin/AddContract', [ContractController::class, 'OpenView'])->name('AddC');
    Route::post('/Admin/AddContract/Store', [ContractController::class, 'Add'])->name('AddContract');
    Route::post('/Admin/Contract/Edit', [ContractController::class, 'action'])->name('ConEdit');
    
    Route::get('/Admin/AddLand', [AddLandController::class, 'OpenView'])->name('AddL');
    Route::post('/Admin/AddLand/Store', [AddLandController::class, 'Add'])->name('AddBlock');
    Route::get('/Admin/BlockTable', [BlockTableController::class, 'OpenView'])->name('BlockTable');
    Route::post('/Admin/BlockTable/Edit', [BlockTableController::class, 'action'])->name('BEdit');
    
    Route::get('/Admin/AddInstallment', [InstallmentController::class, 'OpenView'])->name('AddI');
    Route::post('/Admin/AddInstallment/Store', [InstallmentController::class, 'Add'])->name('AddIns');
    Route::post('/Admin/TableEdit', [InstallmentController::class, 'action'])->name('IEdit');
    Route::get('/Admin/BlockDetails/{id}', [InstallmentController::class, 'blockDetails'])->name('blockDetails');
    
    Route::get('/Admin/InstallmentsTable', [InstallmentController::class, 'list'])->name('ITable');
    
    Route::get('/Admin/Contracts', [ContractListController::class, 'OpenView'])->name('ConTable');
    Route::get('/Admin/Contracts/Action', [ContractListController::class, 'action'])->name('TableEdit');
    
    Route::get('/Admin/Commissions', [AddAgentController::class, 'list'])->name('CommTable');
    Route::get('/Admin/AddAgent', [AddAgentController::class, 'OpenView'])->name('AddA');
    Route::post('/Admin/AddAgent/Store', [AddAgentController::class, 'Add'])->name('AddAgent');
    Route::post('/Admin/ComissiontableControl', [AddAgentController::class, 'action'])->name('marEdit');
    Route::get('/Admin/ComissiontableControl/details/{Name}', [AddAgentController::class, 'CommDetails'])->name('CommModal');
 });

