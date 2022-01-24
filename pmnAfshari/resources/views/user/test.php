<?php
//
//namespace App\Models;
//
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;
//
//class Booking extends Model
//{
//    use HasFactory;
//
//    protected $guarded = [];
//
//    public function service()
//    {
//        return $this->belongsTo(Service::class);
//    }
//
//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function provider()
//    {
//        return $this->belongsTo(Provider::class);
//    }
//
//    public function totalPrice(User $user)
//    {
//        $totalPrice = 0;
//        foreach (Booking::all() as $booking) {
//            if ($booking->user_id == $user->id) {
//                $totalPrice = ($booking->service->price) + $totalPrice;
//            }
//        }
//        return $totalPrice;
//    }
//
//    public function totalPrepayment(User $user)
//    {
//        $totalPrepayment = 0;
//        foreach (Booking::all() as $booking) {
//            if ($booking->user_id == $user->id) {
//
//                $totalPrepayment = (($booking->service->price) * ($booking->service->prepayment / 100)) + $totalPrepayment;
//            }
//        }
//        return $totalPrepayment;
//    }
//
//    public function Buying()
//    {
//        return $this->belongsTo(Buying::class);
//    }
//
//
//    public function countBook($booked)
//    {
//        $count = 0;
//        foreach (Buying::all() as $cart) {
//
//            foreach ($booked as $book) {
//                if ($cart->booking_id == $book->id) {
//                    $count++;
//                }
//            }
//        }
//        return $count;
//    }
//
//
//    public function serviceTime(Booking $booked)
//    {
//        $serviceId = Booking::where('id', $booked->id)->first();
//        $serviceTime = Service::where('id', $serviceId->service_id)->first();
//        return $serviceTime->servicetime;
//    }
//
//    public function endClock($bookingId, $clock)
//    {
//        $serviceTime = Booking::serviceTime($bookingId);
//
//        if ($serviceTime == 30) {
//            $time = strtotime($clock);
//            $endTime = date("H:i", strtotime('+30 minutes', $time));
//
//        } elseif ($serviceTime == 60) {
//            $time = strtotime($clock);
//            $endTime = date("H:i", strtotime('+60 minutes', $time));
//
//        } elseif ($serviceTime == 90) {
//            $time = strtotime($clock);
//            $endTime = date("H:i", strtotime('+90 minutes', $time));
//
//        } elseif ($serviceTime == 120) {
//            $time = strtotime($clock);
//            $endTime = date("H:i", strtotime('+120 minutes', $time));
//
//        }
//        return $endTime;
//    }
//
//    public function check($booking)
//    {
//
//        $boodIds = Booking::query()
//            ->where('provider_id', $booking->provider_id)
//            ->where('date', $booking->date)
//            ->get();
//
//        $count = 0;
//        foreach ($boodIds as $boodId) {
//            if (Buying::query()->where('booking_id', $boodId->id)->exists()) {
//                $count++;
//            }
//
//        }
//        return $count;
//    }
//
//
//
//
//    public function createClock($booked)
//    {
//        $collection = collect([]);
//
//        $start = WorkTime::first()->start;
//        $end = WorkTime::first()->end;
//
//        for ($clock = $start; $clock <= $end;) {
//            if (Booking::workAndoffTimeStatment($booked, $clock) == 0) {
//                $collection->push($clock);
//
//            }
//
//            if (Booking::check($booked) == 0) {
////            dd(1);
//                for ($clock = $start; $clock <= $end;) {
//                    if (Booking::workAndoffTimeStatment($booked, $clock) == 0) {
//                        $collection->push($clock);
//
//                    }
//
//                    $time = strtotime($clock);
//                    $clock = date("H:i", strtotime('+15 minutes', $time));
//
//                    if ($end <= Booking::endClock($booked, $clock)) {
//                        return $collection->all();
//                    }
//                }
//
//            } else {
//                for ($clock = $start; $clock <= $end;) {
//
//                    if (Booking::workAndoffTimeStatment($booked, $clock) != 0) {
//                        $clock = Booking::workAndoffTimeStatment($booked, $clock);
//                        $collection->push($clock);
//
//                    }
//
//
//                    $time = strtotime($clock);
//                    $clock = date("H:i", strtotime('+15 minutes', $time));
//
//                    if ($end <= Booking::endClock($booked, $clock)) {
//
//                        return $collection->all();
//                    }
//                }
//
//
////            return $collection->all();
//
//            }
//
//
//        }
//
//        public function optionClock($booked)
//    {
//        $clocks = Booking::createClock($booked);
//        foreach ($clocks as $clock) {
//            return $clock;
//        }
//
//    }
//
//
//        public function clock($booking, $clock)
//    {
//        $temp = 0;
//        $boodIds = Booking::query()
//            ->where('provider_id', $booking->provider_id)
//            ->where('date', $booking->date)
//            ->get();
//
//
//        foreach ($boodIds as $boodId) {
//            $endTime = Booking::endClock($boodId, $clock);
//            $count = Buying::query()->where('booking_id', $boodId->id)->count();
//
//            foreach (Buying::query()->where('booking_id', $boodId->id)->get() as $buy) {
//                if (($buy->clock >= $clock && $buy->clock >= $endTime) || ($buy->endClock <= $clock && $buy->endClock <= $endTime)) {
//                    $temp = $temp + 1;
//                }
//
//                if ($temp == $count) {
//                    return 1;
//                }
//            }
//
//
//        }
//        return 0;
//
//    }
//
//        public function workAndoffTimeStatment($booked, $clock)
//    {
////        $clock="08:00";
//
//        $endTime = Booking::endClock($booked, $clock);
//        $temp = 0;
//
//        $boodIds = Booking::query()
//            ->where('provider_id', $booked->provider_id)
//            ->where('date', $booked->date)
//            ->get();
//
//
//        if (WorkTime::first()->start <= $clock && (WorkTime::first()->end) >= $clock && WorkTime::first()->end >= $endTime) {
//
//            if (OffTime::exists()) {
//                //check kardim te tatili nabashe
//                if ((OffTime::first()->start <= $clock && (OffTime::first()->end) <= $clock) || (OffTime::first()->start >= $clock && (OffTime::first()->end) >= $clock)) {
//
//                    if (Booking::clock($booked, $clock) == 1) {
//                        return 1;
//                    }
//
//                    if (Booking::clock($booked, $clock) == 0) {
//                        return 0;
//                    }
//
//                }
//
//            }
//            else {
//
//                $count = Booking::check($booked);
//                $count1 = 0;
//                foreach ($boodIds as $boodId) {
//                    $endTime = Booking::endClock($boodId, $clock);
//
//                    foreach (Buying::all() as $buy) {
//                        if ($boodId->id == $buy->booking_id) {
////                            dd(!($buy->clock >= $clock && $buy->clock >= $endTime && $buy->clock != $clock) || ($buy->endClock <= $clock && $buy->endClock <= $endTime));
//                            if (($buy->clock >= $clock && $buy->clock >= $endTime && $buy->clock != $clock) ||
//                                ($buy->endClock <= $clock && $buy->endClock <= $endTime && $buy->clock != $clock)) {
//                                $count1++;
//                            }
//
//                        }
//
//                    }
//
//                }
//                if ($count = $count1) {
//                    return $clock;
//                } else
//                    return 0;
//
//
//            }
//
//        }
//
//
//    }
//
//
//    }
//
