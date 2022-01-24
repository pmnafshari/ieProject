<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Booking;
use App\Models\Branch;
use App\Models\Buying;
use App\Models\Cart;
use App\Models\Code;
use App\Models\Discount;
use App\Models\Gallery;
use App\Models\Offer;
use App\Models\OffTime;
use App\Models\Service;
use App\Models\User;
use App\Models\WorkTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;
use function PHPUnit\Framework\isType;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.booking.index',[
            'branches'=>Branch::all(),
            'services'=>Service::all(),
            'user'=>Auth::user()

        ]);
    }


    public function gallery(Service $service)
    {

        return view('user.gallery.index',[
            'service'=>$service,
            'gallery'=>Gallery::all(),
            'booking'=>Booking::all()

        ]);
    }
    public function show(User $user){

        return view('user.booking.setClock',[
            'booking'=>Booking::query()->where('user_id',$user->id)->get(),
            'user'=>$user,
            'offTime'=>OffTime::all()->first->get(),
            'workTime'=>WorkTime::all()->first()->get(),

        ]);
    }
    public function deleteShow(User $user){
//        dd($user->id);
        return view('user.booking.setClock',[
            'booking'=>Booking::query()->where('user_id',$user->id)->get(),
            'user'=>$user

        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Service $service)
    {

        if ($request['provider_id'] == null ){
            session()->flash('danger','فیلد ارائه دهنده نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['date'] == null ){
            session()->flash('danger','فیلد تاریخ نمیتواند خالی باشد');
            return redirect()->back();
        }

        $date = CalendarUtils::convertNumbers($request->date, true);
        $bookingDate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        $booking=new Booking();
        $booking->user_id = Auth::id();
        $booking->service_id =$service['id'];
        $booking->provider_id =$request['provider_id'];
        $booking->date =$bookingDate;
        $booking->status ='yes';

        $booking->save();
        session()->flash('success','خدمت مورد نظر به لیست سفارشات شما اضافه شد');

        return redirect()->back();

    }

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }

    public function setClock(Request $request,Booking $booked){

        $serviceTime=Booking::serviceTime($booked);

        if ($serviceTime == 30){
            $time = strtotime($request['clock']);
            $endTime = date("H:i",strtotime('+30 minutes',$time));

        }
        elseif($serviceTime == 60){
            $time = strtotime($request['clock']);
            $endTime = date("H:i",strtotime('+60 minutes',$time));

        }
         elseif($serviceTime == 90){
                    $time = strtotime($request['clock']);
                    $endTime = date("H:i",strtotime('+90 minutes',$time));

                }
         elseif($serviceTime == 120){
                    $time = strtotime($request['clock']);
                    $endTime = date("H:i",strtotime('+120 minutes',$time));

                }

        $user=Auth::user();

        if ($request['clock']== null){
            session()->flash('setClock','ساعت خدمت را انتخاب کنید');
            return redirect(route('booking.delete.clock',$user));
        }

       $buy=new Buying();
        $buy->booking_id =$booked->id;
        $buy->clock =$request['clock'];
        $buy->endClock =$endTime;
        $buy->save();

        session()->flash('setClock','ساعت خدمت برای شما با موفقیت ذخیره شد');

        return redirect(route('booking.delete.clock',$user));


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Booking $booked)
    {
        Buying::where('booking_id',$booked->id)->delete();
        $booked->delete();
        $user=Auth::user();
        session()->flash('bookingDelete','خدمت مورد نظر با موفقیت از لیست سفارشات شما حذف شد');

        return redirect(route('booking.delete.clock',$user));
    }

    public static function preFactor(User $user){

        return view('user.booking.preFactor',[
            'user'=>$user,
            'booked'=>Booking::where('user_id',$user->id)->get(),

        ]);

    }



}
