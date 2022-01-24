<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function Buying()
    {
        return $this->belongsTo(Buying::class);
    }


///////////////////////////////////////////////////////

    public function totalPrice(User $user)
    {
        $totalPrice = 0;
        foreach (Booking::all() as $booking) {
            if ($booking->user_id == $user->id) {
                $totalPrice = ($booking->service->price) + $totalPrice;
            }
        }
        return $totalPrice;
    }



    public function perFactorPrice(User $user)
    {
        $totalPrice = 0;

        $bookIds = Booking::query()
            ->where('user_id', $user->id)
            ->get()->pluck('id')->toArray();

        $buying = Buying::WhereIn('booking_id', $bookIds)->select('booking_id')->get()->toArray();

        $collections = Collection::make($buying);

        foreach ($collections as $collec) {
            foreach (Booking::all() as $booking){

                if ($collec['booking_id'] == $booking->id){

                    $totalPrice = ($booking->service->price) + $totalPrice;
                }

            }
            }

        return $totalPrice;
    }


    public function totalPrepayment(User $user)
    {
        $totalPrepayment = 0;
        foreach (Booking::all() as $booking) {
            if ($booking->user_id == $user->id) {

                $totalPrepayment = (($booking->service->price) * ($booking->service->prepayment / 100)) + $totalPrepayment;
            }
        }
        return $totalPrepayment;
    }


    public function perFactorPrepayment(User $user)
    {
        $totalPrepayment = 0;

        $bookIds = Booking::query()
            ->where('user_id', $user->id)
            ->get()->pluck('id')->toArray();

        $buying = Buying::WhereIn('booking_id', $bookIds)->select('booking_id')->get()->toArray();

        $collections = Collection::make($buying);

        foreach ($collections as $collec) {
            foreach (Booking::all() as $booking){

                if ($collec['booking_id'] == $booking->id){

                    $totalPrepayment = (($booking->service->price) * ($booking->service->prepayment / 100)) + $totalPrepayment;
                }

            }
        }

        return $totalPrepayment;
    }

///////////////////////////////////////////////////////



    public function countBook($booked)
    {
        $count = 0;
        foreach (Buying::all() as $cart) {

            foreach ($booked as $book) {
                if ($cart->booking_id == $book->id) {
                    $count++;
                }
            }
        }
        return $count;
    }

/////////////////////////
    public function serviceTime($booked)
    {
        $serviceId = Booking::where('id', $booked->id)->first();
        $serviceTime = Service::where('id', $serviceId->service_id)->first();
        return $serviceTime->servicetime;
    }

    public function endBookingClockWhenWeHaveBookingId($bookingId, $clock)
    {
        $serviceId = Booking::where('id', $bookingId)->first();
        $serviceTimes = Service::where('id', $serviceId->service_id)->first();
        $serviceTime = $serviceTimes->servicetime;
        if ($serviceTime == 30) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+30 minutes', $time));

        } elseif ($serviceTime == 60) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+60 minutes', $time));

        } elseif ($serviceTime == 90) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+90 minutes', $time));

        } elseif ($serviceTime == 120) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+120 minutes', $time));

        }
        return $endTime;

    }


    public function endClock($bookingId, $clock)
    {
        $serviceTime = Booking::serviceTime($bookingId);

        if ($serviceTime == 30) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+30 minutes', $time));

        } elseif ($serviceTime == 60) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+60 minutes', $time));

        } elseif ($serviceTime == 90) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+90 minutes', $time));

        } elseif ($serviceTime == 120) {
            $time = strtotime($clock);
            $endTime = date("H:i", strtotime('+120 minutes', $time));

        }
        return $endTime;
    }


    public function check($booking)
    {

        $boodIds = Booking::query()
            ->where('provider_id', $booking->provider_id)
            ->where('date', $booking->date)
            ->get();

        $count = 0;
        foreach ($boodIds as $boodId) {
            if (Buying::query()->where('booking_id', $boodId->id)->exists()) {
                $count++;
            }

        }
        return $count;
    }


    public function createClock($booked)
    {
        $clocks = collect([]);

        $provider_id=$booked->provider_id;
        $provider=Provider::query()->where('id' , $provider_id)->first();
        $start = $provider->start;
        $end =$provider->end;

        for ($clock = $start; $clock <= $end;) {
            $endclock=Booking::endClock($booked,$clock);

            if ($endclock <= $end){
                if (OffTime::exists()){

                    if ((OffTime::first()->start <= $clock && (OffTime::first()->end) <= $clock) ||

                        (OffTime::first()->start >= $clock && (OffTime::first()->end) >= $clock)) {
                        $clocks->push($clock);
                        $time = strtotime($clock);
                        $clock = date("H:i", strtotime('+15 minutes', $time));
                    }
                    else{
                        $time = strtotime($clock);
                        $clock = date("H:i", strtotime('+15 minutes', $time));
                    }

                }


                else

                {
                    $clocks->push($clock);
                    $time = strtotime($clock);
                    $clock = date("H:i", strtotime('+15 minutes', $time));
                }

            }
            else{
                $time = strtotime($clock);
                $clock = date("H:i", strtotime('+15 minutes', $time));
            }


        }


        $bookIds = Booking::query()
            ->where('provider_id', $booked->provider_id)
            ->where('date', $booked->date)
            ->get()->pluck('id')->toArray();

        $buying = Buying::WhereIn('booking_id', $bookIds)->select('booking_id', 'clock', 'endClock')->get()->toArray();

        $collections = Collection::make($buying);


        $result = $clocks->filter(function ($item) use ($collections) {
            return !$collections->contains(function ($value, $key) use ($item) {
                $endTimeItem = Booking::endBookingClockWhenWeHaveBookingId($value['booking_id'], $item);
                $end = WorkTime::first()->end;
                return ($item >= $value['clock'] && $item <= $value['endClock'] && $endTimeItem <= $end)
                    || ($endTimeItem >= $value['clock'] && $endTimeItem <= $value['endClock'] && $endTimeItem <= $end);
            }

            );
        });

//        dd($result);

        return $result;

    }


    public function workAndoffTimeStatment($booked, $clock)
    {

        $endTime = Booking::endClock($booked, $clock);
        $temp = 0;

        $boodIds = Booking::query()
            ->where('provider_id', $booked->provider_id)
            ->where('date', $booked->date)
            ->get();


        if (WorkTime::first()->start <= $clock && (WorkTime::first()->end) >= $clock && WorkTime::first()->end >= $endTime) {

            if (OffTime::exists()) {
                //check kardim te tatili nabashe
                if ((OffTime::first()->start <= $clock && (OffTime::first()->end) <= $clock) || (OffTime::first()->start >= $clock && (OffTime::first()->end) >= $clock)) {

                    if (Booking::clock($booked, $clock) == 1) {
                        return 1;
                    }

                    if (Booking::clock($booked, $clock) == 0) {
                        return 0;
                    }

                }

            } else {

                $count = Booking::check($booked);
                $count1 = 0;
                foreach ($boodIds as $boodId) {
                    $endTime = Booking::endClock($boodId, $clock);

                    foreach (Buying::all() as $buy) {
                        if ($boodId->id == $buy->booking_id) {
//                            dd(!($buy->clock >= $clock && $buy->clock >= $endTime && $buy->clock != $clock) || ($buy->endClock <= $clock && $buy->endClock <= $endTime));
                            if (($buy->clock >= $clock && $buy->clock >= $endTime && $buy->clock != $clock) ||
                                ($buy->endClock <= $clock && $buy->endClock <= $endTime && $buy->clock != $clock)) {
                                $count1++;
                            }

                        }

                    }

                }
                if ($count = $count1) {
                    return $clock;
                } else
                    return 0;


            }

        }


    }



}

