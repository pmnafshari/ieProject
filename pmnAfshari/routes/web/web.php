<?php

use App\Exports\InvoicesExport;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', function () {

//    return Excel::download(new InvoicesExport(1), 'invoices.xlsx');
//$code = Crypt::encrypt('123456');
//    $user = \App\Models\admin\User::find(4);
//
//        Crypt::setKey(Config::get('app.key'));
//    dd(
//        $user->password,
//        Crypt::decrypt($user->password)
//    );

//    $userMobile='09055126327';
//    $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
//        'username' => 'rivassystem',
//        'password' => '!R!v@$?14392920',
//        'to' => $userMobile,
//        'from' => '50004000709170',
//        'text' => 'dd',
//        'isFlash' => false,
//    ])->json();
//    dd($response);



//    $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
//        'username' => 'rivassystem',
//        'password' => '!R!v@$?14392920',
//        'to' => '09119286499',
//        'from' => '50004000709170',
//        'text' => '  rivas ارسال پیامک تستی',
//        'isFlash' => false,
//    ])->json();

//    dd($response);

    return view('admin.login.login');

});


//login
Route::get('/login',[LoginController::class ,'create'])->name('login.create');
Route::get('/reload',[LoginController::class ,'reload']);
Route::post('/login',[LoginController::class ,'store'])->name('login.store');

//signup
Route::get('/registerPage',[LoginController::class ,'register'])->name('registerCreate');
Route::post('/registerStore',[LoginController::class ,'registerFirst'])->name('registerFirst');

//send otp code to email
Route::get('/forgetPassword',[LoginController::class ,'forgetPasswordShow'])->name('forgetPassword');
Route::post('/forgetPassword-reset',[LoginController::class ,'sendMail'])->name('login.resetPassword');
Route::post('/registerOtp/{user}',[LoginController::class ,'verifyOtp'])->name('login.verifyOtp');
//set new pass
Route::post('/forgetPassword/{user}',[LoginController::class ,'updatePasswordShow'])->name('updatePassword.show');
Route::patch('/forgetPassword/{user}',[LoginController::class ,'updatePassword'])->name('updatePassword');
//logout
Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
//rules
Route::get('/acceptRule',[ProfileController::class,'acceptRule'])->name('acceptRule');
Route::post('/acceptedRule',[ProfileController::class,'acceptedRule'])->name('acceptedRule');


