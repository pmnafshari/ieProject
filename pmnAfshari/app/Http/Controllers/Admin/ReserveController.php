<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Buying;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index(User $user){
        return view('user.reserve.list',[
            'user'=>$user,
            'booking'=>Booking::where('user_id',$user->id),
            'cart'=>Buying::all()
        ]);
    }
}
