<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\ContrastServiceController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\EventServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecialController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
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





    Route::get('/', function() {
        return view('admin.home');
    });
//profile
Route::get('/profile',[AdminProfileController::class ,'profile'])->name('admin.profile');

//user
    Route::get('/users-list',[UserController::class , 'index'])->name('user.list');
    Route::get('/create-user',[UserController::class , 'create'])->name('user.create');
    Route::post('/users-list', [UserController::class, 'store'])->name('user.store');
    Route::get('/contract-list/{user}',[UserController::class ,'contract'])->name('user.contract');
    Route::get('/user-edit/{user}',[UserController::class , 'edit'])->name('user.edit');
    Route::patch('/user-update/{user}',[UserController::class , 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/child/{child}', [UserController::class, 'destroyChild'])->name('child.destroy');
    Route::patch('/user-status/{user}',[UserController::class , 'updateStatus'])->name('user.status.update');

//role
    Route::get('/roles-list',[RoleController::class , 'index'])->name('role.list');
    Route::get('/create-role',[RoleController::class , 'create'])->name('role.create');
    Route::post('/roles-list', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role-edit/{role}',[RoleController::class , 'edit'])->name('role.edit');
    Route::patch('/role-update/{role}',[RoleController::class , 'update'])->name('role.update');
    Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');


//contract
    Route::get('/contract-list',[ContrastServiceController::class , 'index'])->name('contract.index');
    Route::post('/contract-list', [ContrastServiceController::class, 'store'])->name('contract.store');
    Route::get('/create-contract',[ContrastServiceController::class , 'create'])->name('create.contract');
    Route::get('/contract-edit/{contract}',[ContractController::class , 'edit'])->name('contract.edit');
    Route::patch('/contract-update/{contract}',[ContractController::class , 'update'])->name('contract.update');
    Route::get('/contract-detail/{contract}',[ContractController::class , 'show'])->name('contract.detail');
    Route::delete('/contract/{contract}', [ContractController::class, 'destroy'])->name('contract.destroy');
    Route::patch('/contract-status/{contract}',[ContractController::class , 'updateStatus'])->name('contract.status.update');


//branch
    Route::get('/branch-list',[BranchController::class , 'index'])->name('branch.index');
    Route::get('/branch/{branch}/services',[BranchController::class , 'show'])->name('branch.services');
    Route::post('/branch-lists', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/create-branch',[BranchController::class , 'create'])->name('branch.create');
    Route::get('/edit/{branch}',[BranchController::class , 'edit'])->name('branch.edit');
    Route::patch('/update/{branch}',[BranchController::class , 'update'])->name('branch.update');
    Route::delete('/branch/{branch}', [BranchController::class, 'destroy'])->name('branch.destroy');
    Route::patch('/branch-status/{branch}',[BranchController::class , 'updateStatus'])->name('branch.status.update');


//service
    Route::get('/create-service',[ServiceController::class , 'create'])->name('service.create');
    Route::get('/service-list',[ServiceController::class , 'index'])->name('service.index');
    Route::post('/service-lists', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service-edit/{service}',[ServiceController::class , 'edit'])->name('service.edit');
    Route::patch('/update-service/{service}',[ServiceController::class , 'update'])->name('service.update');
    Route::delete('/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::patch('/service-status/{service}',[ServiceController::class , 'updateStatus'])->name('service.status.update');


//galley
    Route::get('/gallery/{service}',[GalleryController::class ,'index'])->name('picture.index');
    Route::post('/picture-lists/{service}', [GalleryController::class, 'store'])->name('picture.store');
    Route::delete('/picture/{gallery}', [GalleryController::class, 'destroy'])->name('picture.destroy');

//discount
    Route::get('/discount-list',[DiscountController::class , 'index'])->name('discount.index');
    Route::post('/discount-lists', [DiscountController::class, 'store'])->name('discount.store');
    Route::get('/create-discount',[DiscountController::class , 'create'])->name('discount.create');
    Route::get('/discount-edit/{discount}',[DiscountController::class , 'edit'])->name('discount.edit');
    Route::patch('/update-discount/{discount}',[DiscountController::class , 'update'])->name('discount.update');
    Route::delete('/discount/{discount}', [DiscountController::class, 'destroy'])->name('discount.destroy');
    Route::patch('/discount-status/{discount}',[DiscountController::class , 'updateStatus'])->name('discount.status.update');



//offer
    Route::get('/offer/list',[OfferController::class , 'index'])->name('offer.index');
    Route::post('/offer/list', [OfferController::class, 'store'])->name('offer.store');
    Route::get('/create-offer',[OfferController::class , 'create'])->name('offer.create');
    Route::get('/offer/code/{offer}',[OfferController::class , 'show'])->name('offer.code');
    Route::patch('/offer-status/{offer}',[OfferController::class , 'updateStatus'])->name('offer.status.update');
    Route::get('/offer/code/download/{offer}',[OfferController::class , 'export'])->name('offer.xls');


//partner
    Route::get('/partner-list',[PartnerController::class , 'index'])->name('partner.index');
    Route::post('/partner-list', [PartnerController::class, 'store'])->name('partner.store');
    Route::get('/create-partner',[PartnerController::class , 'create'])->name('partner.create');
    Route::get('/partner-contract/{partner}',[PartnerController::class , 'show'])->name('partner.contract');
    Route::get('/partner-edit/{partner}',[PartnerController::class , 'edit'])->name('partner.edit');
    Route::patch('/update-partner/{partner}',[PartnerController::class , 'update'])->name('partner.update');
    Route::delete('/partner/{partner}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    Route::patch('/partner-status/{partner}',[PartnerController::class , 'updateStatus'])->name('partner.status.update');

//provider
    Route::get('/provider-list',[ProviderController::class , 'index'])->name('provider.index');
    Route::post('/provider-list', [ProviderController::class, 'store'])->name('provider.store');
    Route::get('/create-provider',[ProviderController::class , 'create'])->name('provider.create');
    Route::get('/provider-edit/{provider}',[ProviderController::class , 'edit'])->name('provider.edit');
    Route::patch('/provider-update/{provider}',[ProviderController::class , 'update'])->name('provider.update');
    Route::delete('/provider/{provider}', [ProviderController::class, 'destroy'])->name('provider.destroy');
    Route::patch('/provider-status/{provider}',[ProviderController::class , 'updateStatus'])->name('provider.status.update');


//event
    Route::get('/event-list',[EventServiceController::class ,'index'])->name('event.index');
 //public event = event
    Route::post('/public.store', [EventServiceController::class,'store'])->name('public.event.store');
    Route::get('/create-publicEvent',[EventServiceController::class ,'create'])->name('create.p.event');
    Route::get('/event-list-public',[EventServiceController::class ,'publicList'])->name('event.p.index');
    Route::patch('/event-update-status/{event}',[EventServiceController::class , 'updateStatus'])->name('event.status.update');
    Route::get('/event.edit/{event}',[EventServiceController::class ,'edit'])->name('event.edit.p');
    Route::patch('/event.update/{event}',[EventServiceController::class , 'update'])->name('event.p.update');
    Route::delete('/event/{event}', [EventServiceController::class, 'destroy'])->name('event.destroy');

 //special event
    Route::get('/event-list-specially',[SpecialController::class ,'index'])->name('event.s.index');
    Route::get('/create-specialEvent',[SpecialController::class , 'create'])->name('create.s.event');
    Route::post('/specially.store', [SpecialController::class, 'store'])->name('event.s.store');
    Route::patch('/special-status/{special}',[SpecialController::class , 'updateStatus'])->name('special.status.update');
    Route::get('/special.edit/{special}',[SpecialController::class , 'edit'])->name('specially.edit');
    Route::patch('/special.update/{special}',[SpecialController::class , 'update'])->name('special.update');
    Route::delete('/special/{special}', [SpecialController::class, 'destroy'])->name('special.destroy');


//support page
    Route::get('/lists',[SupportController::class , 'index'])->name('list.support');
    Route::get('/create-support',[SupportController::class , 'create'])->name('create.support');
    Route::post('/support.store', [SupportController::class, 'store'])->name('support.store');

//order list - use default value for this list
    Route::get('/order-list',[OrderController::class ,'index'])->name('order.index');

//ticket
    Route::get('/ticket-public',[TicketController::class ,'index'])->name('ticket.index');
    Route::get('/create-ticket',[TicketController::class ,'create'])->name('create.ticket');
    Route::post('/ticket.store', [TicketController::class, 'store'])->name('ticket.store');
    Route::get('/ticketDetail/{ticket}',[TicketController::class ,'ticketDetail'])->name('ticketDetail');


    Route::get('/ticket',[TicketController::class ,'userTicketList'])->name('userTicketList');
    Route::get('/userTicketCreate',[TicketController::class ,'userTicketCreate'])->name('userTicketCreate');
    Route::post('/storeUserTicket', [TicketController::class, 'storeUserTicket'])->name('storeUserTicket');



    Route::get('/ticket.show/{ticket}',[TicketController::class ,'show'])->name('ticket.show');
    Route::patch('/ticketText.store/{ticket}', [TicketController::class, 'textTicket'])->name('ticket.store.text');

//planing
    Route::get('/workTime',[PlanController::class ,'workTimeSet'])->name('workTimeSet');
    Route::post('/set-workTime', [PlanController::class, 'workTimeStore'])->name('workTime.store');
    Route::get('/detailsWorkTime',[PlanController::class ,'show'])->name('workTimeDetail');
    Route::get('/offTimeSet/{workTime}',[PlanController::class ,'offTimeSet'])->name('offTimeSet');
    Route::post('/set-offTime', [PlanController::class, 'offTimeStore'])->name('offTime.store');
    Route::get('/workTime/edit/{workTime}',[PlanController::class ,'edit'])->name('workTime.edit');
    Route::patch('/workTime/update/{workTime}',[PlanController::class , 'update'])->name('workTime.update');
    Route::get('/offTime/edit/{workTime}',[PlanController::class ,'editOffTime'])->name('offTime.edit');
    Route::patch('/offTime/update/{workTime}',[PlanController::class , 'offTimeUpdate'])->name('offTime.update');
    Route::delete('/offTime/delete', [PlanController::class, 'destroy'])->name('offTime.destroy');
//setting

Route::get('/setting/create',[SettingController::class ,'create'])->name('api.setting.create');
Route::post('/setting/set', [SettingController::class, 'store'])->name('apiStore');
Route::get('/setting/edit',[SettingController::class ,'edit'])->name('apiSetting.edit');
Route::patch('/setting/update/{setting}',[SettingController::class , 'update'])->name('apiSetting.update');

//rule
Route::get('/rules',[RuleController::class ,'create'])->name('rules.create');
Route::post('/rules/set', [RuleController::class, 'store'])->name('rules.store');
Route::get('/rules/edit',[RuleController::class ,'edit'])->name('rules.edit');
Route::patch('/rules/update/{rules}',[RuleController::class ,'update'])->name('rules.update');


//reports
Route::get('/reports',[ReportController::class ,'index'])->name('reports');

//مجموعه
Route::get('/create-account',[AccountController::class , 'create'])->name('account.create');
Route::post('/account/store', [AccountController::class, 'store'])->name('account.store');
Route::get('/account/edit',[AccountController::class , 'edit'])->name('account.edit');
Route::patch('/account/update/{account}',[AccountController::class , 'update'])->name('account.set.update');


