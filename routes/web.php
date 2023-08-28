<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Settings\ActivityAreaController;
use App\Http\Controllers\Settings\BankController;
use App\Http\Controllers\Settings\CompanyCategoryController;
use App\Http\Controllers\Settings\CompanyNameController;
use App\Http\Controllers\Settings\CompanyAddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Settings\CompanyTypeController;
use App\Http\Controllers\Settings\ContractController;
use App\Http\Controllers\Settings\CurrencyController;
use App\Http\Controllers\Settings\EmployeeController;
use App\Http\Controllers\Settings\InstitutionController;
use App\Http\Controllers\Settings\MeetingTypeController;
use App\Http\Controllers\Settings\PaymentConditionController;
use App\Http\Controllers\Settings\PaymentTypeController;
use App\Http\Controllers\Settings\SenderController;
use App\Http\Controllers\Settings\ServiceOfferController;
use App\Http\Controllers\Settings\SourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatController;
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

Route::get('/', [PageController::class,'login'])->name('login');
Route::get('/register', [PageController::class,'register'])->name('register');
Route::post('/login_submit',[AuthController::class,'login_submit'])->name('login_submit');
Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');

Route::group(['middleware' =>'auth'], function (){

    Route::get('/home', [PageController::class,'home'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('customers',CustomerController::class);

    Route::resource('acts',ActController::class);
    Route::resource('payments',PaymentController::class);
    Route::resource('vats',VatController::class);
    Route::resource('meetings',MeetingController::class);

    //setting routes start

        Route::resource('company_names',CompanyNameController::class);
        Route::resource('institutions',InstitutionController::class);
        Route::resource('company_categories',CompanyCategoryController::class);
        Route::resource('activity_areas',ActivityAreaController::class);
        Route::resource('company_addresses',CompanyAddressController::class);
        Route::resource('company_types',CompanyTypeController::class);
        Route::resource('contracts',ContractController::class);
        Route::resource('currencies',CurrencyController::class);
        Route::resource('payment_types',PaymentTypeController::class);
        Route::resource('payment_conditions',PaymentConditionController::class);
        Route::resource('banks',BankController::class);
        Route::resource('employees',EmployeeController::class);
        Route::resource('senders',SenderController::class);
        Route::resource('meeting_types',MeetingTypeController::class);
        Route::resource('service_offers',ServiceOfferController::class);
        Route::resource('sources',SourceController::class);

    //setting routes end


});
