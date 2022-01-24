<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    public function countTodayBook(){
        $mytime = Carbon::now();
        $count=0;
        foreach (Buying::all() as $buy){
            foreach (Booking::all() as $book){
                if ($book->id == $buy->booking_id){
                    if ($book->date == $mytime->format('Y-m-d')){
                        $count++;
                    }
                }
            }
        }
        return $count;
    }
}
