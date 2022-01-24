<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

class Report extends Model
{
    use HasFactory;
    protected $guarded=[];


 //genderChart
    public function genderMan(){
        $man=0;
        foreach (User::all() as $user) {
            if ($user->gender == 'مرد'){
                $man++;
            }
        }
        return $man;
        }

    public function genderWoman(){
        $woman=0;
        foreach (User::all() as $user) {
            if ($user->gender == 'زن'){
                $woman++;
            }
        }
        return $woman;

    }
    public function genderUnknown(){
        $unknown=-2;
        foreach (User::all() as $user) {
            if ($user->gender == null){
                $unknown++;
            }
        }
        return $unknown;

    }

//monthReserve

        public function monthReserve($month){
        $count=0;
        foreach (Buying::all() as $buy){
            foreach (Booking::all() as $book){
                if ($buy->booking_id == $book->id ){
                    if (jdate($book->date)->format('m') == $month){
                        $count++;
                    }
                }
            }
        }
        return $count;

        }

        public function monthInvoice($month){
        $invoice=0;

            foreach (Buying::all() as $buy){
                foreach (Booking::all() as $book){
                    if ($buy->booking_id == $book->id ){
                        if (jdate($book->date)->format('m') == $month){
                            foreach (Service::all() as $service){
                                if ($service->id == $book->service_id){
                                    $invoice=$invoice + $service->price;
                                }
                            }
                        }

                    }
                }

            }
            return $invoice;

        }

}
