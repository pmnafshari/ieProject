<?php

use App\Http\Controllers\Admin\ApplyDicountAndOfferController;
use App\Http\Controllers\Admin\ReserveController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\ClientTicketController;
use App\Http\Controllers\User\ProfileController;
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
    return redirect(route('booking.index'));
});


//ticket
Route::get('/ticket-public',[ClientTicketController::class ,'PublicIndex'])->name('publicTicket');
Route::get('/ticketDetail/{ticket}',[ClientTicketController::class ,'publicDetail'])->name('publicTicketDetail');
//userTicket
Route::get('/UserTicketList',[ClientTicketController::class ,'index'])->name('clientTicketList');
Route::get('/UserTicketDetail/{ticket}', [ClientTicketController::class,'detail'])->name('clientTicketDetail');
Route::patch('/storeUserTicket/{ticket}', [ClientTicketController::class, 'store'])->name('clientTicketStore');
Route::get('/CreateNewTicket',[ClientTicketController::class ,'create'])->name('clientTicketCreate');
Route::post('/CreateNewTicket',[ClientTicketController::class ,'newTicket'])->name('clientNewTicket');


//profile
Route::get('/profile',[ProfileController::class ,'profile'])->name('profile');
Route::patch('/profile/update/{user}',[ProfileController::class , 'update'])->name('profile.update');



//booking
Route::get('/bookingService',[BookingController::class ,'index'])->name('booking.index');
Route::post('/booking/store/{service}',[BookingController::class ,'store'])->name('service.booking.Store');
Route::get('/booking.ServiceGallery/{service}',[BookingController::class ,'gallery'])->name('booking.gallery.index');
Route::post('/bookingSetClock/{user}',[BookingController::class ,'show'])->name('booking.clock');
Route::get('/booking/SetClock/{user}',[BookingController::class ,'deleteShow'])->name('booking.delete.clock');
Route::delete('/booking/{booked}',[BookingController::class ,'destroy'])->name('booking.destroy');

Route::post('/booking/setClock/{booked}',[BookingController::class ,'setClock'])->name('booking.setClock');

Route::get('/booking/preFactor/{user}',[BookingController::class,'preFactor'])->name('booking.preFactor');

//reserve
Route::get('/reserve/{user}',[ReserveController::class,'index'])->name('reserve.index');

//contract
Route::get('/contract/{user}',[ProfileController::class ,'contract'])->name('contractUserPanel');
Route::get('/contract/detail/{contract}',[ProfileController::class , 'detail'])->name('contractUserPanel.detail');

//
Route::post('/booking/preFactor/applyDiscount/{user}',[ApplyDicountAndOfferController::class,'SetDiscount'])->name('discount.exists');


