<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Services($booked){
        $servicId = Booking::where('id', $booked)->first();

        $service = Service::where('id', $servicId->service_id)->first();
        return $service;
    }

    public function Booked($booked){
        $booking = Booking::where('id', $booked)->first();
        return $booking;
    }
    public function provider($booked){
        $booking = Booking::where('id', $booked)->first();
        $provider=Provider::where('id',$booking->provider_id)->first();
        return $provider;
    }
    public function prepaymentService($booked){
        $service=Order::Services($booked);
        $calculate=$service->price * ($service->prepayment / 100);
        return $calculate;
    }
    public function user($booked){
        $userId = Booking::where('id', $booked)->first();
        $user = User::where('id', $userId->user_id)->first();
        return $user;
    }
}
