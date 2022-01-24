<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Provider;
use App\Models\Service;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class ProviderController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.provider.index',[
            'providers'=>Provider::all(),
            'services'=>Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provider.create',[
            'branches'=>Branch::all(),
            'services'=>Service::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        if ($request['firstname'] == null ){
            session()->flash('danger','نام نمیتواند خالی باشد');
            return redirect()->back();
        }

         if ($request['lastname'] == null  ){
            session()->flash('danger','نام خانوادگی نمیتواند خالی باشد');
            return redirect()->back();
        }


        if ( $request['mobile']!= null ){
            if (strlen($request['mobile'])>11 || strlen($request['mobile'])<11){
                session()->flash('danger','تعداد ارقام موبایل شما صحیح نمیباشد');
                return redirect()->back();
            }
        }


        foreach (Provider::all() as $provid){
            if ($provid->ncode == $request['ncode'] && $request['ncode'] !=null){
                session()->flash('danger','کد ملی تکراری میباشد . ارائه دهنده ای بااین کد ملی وجود دارد.');
                return redirect()->back();
            }

            if ($provid->email == $request['email'] && $request['ncode'] !=null){
                session()->flash('danger','ایمیل وارد شده تکراری میباشد . ارائه دهنده ای بااین ایمیل وجود دارد.');
                return redirect()->back();
            }

            if ($provid->mobile == $request['mobile']&& $request['ncode'] !=null ){
                session()->flash('danger','شماره موبایل وارد شده تکراری میباشد . ارائه دهنده ای بااین موبایل وجود دارد.');
                return redirect()->back();
            }
        }

        $date = CalendarUtils::convertNumbers($request->birthdate, true);
        $birth_date = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');


        $provider = new Provider();
        $provider->firstname = $request['firstname'];
        $provider->lastname = $request['lastname'];
        $provider->mobile = $request['mobile'];
        $provider->email = $request['email'];
        $provider->ncode = $request['ncode'];
        $provider->gender = $request['gender'];
        $provider->degree = $request['degree'];
        $provider->address = $request['address'];

        $provider->birthdate = $birth_date;



        if ($request['start'] != null ){
            $provider->start = $request['start'];
        }
        else{
            $provider->start = WorkTime::first()->start;
        }
        if ($request['end'] != null ){
            $provider->end = $request['end'];
        }
        else{
            $provider->end =WorkTime::first()->end;;
        }


        $provider->save();

        $provider->services()->sync($request['services']);
        session()->flash('success','ارائه دهنده با موفقیت ایجاد شد');


        return redirect(route('provider.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', [
            'provider' => $provider,
            'services' => Service::all(),
            'branches'=>Branch::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Provider $provider)
    {

        $dateUp = $provider->birthdate;
        if ($request->get('birthdate')){
            $date = CalendarUtils::convertNumbers($request->birthdate, true);
            $dateUp = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        }



        if ($request['firstname'] == null ){
            session()->flash('danger','نام نمیتواند خالی باشد');
            return redirect()->back();
        }

        if ($request['lastname'] == null  ){
            session()->flash('danger','نام خانوادگی نمیتواند خالی باشد');
            return redirect()->back();
        }

        if ( $request['mobile']!= null ){
            if (strlen($request['mobile'])>11 || strlen($request['mobile'])<11){
                session()->flash('danger','تعداد ارقام موبایل شما صحیح نمیباشد');
                return redirect()->back();
            }
        }


        foreach (Provider::all() as $provid){
            if ($provider->ncode !=$request['ncode'] && $provid->ncode == $request['ncode'] && $request['ncode'] !=null){
                session()->flash('danger','کد ملی تکراری میباشد . ارائه دهنده ای بااین کد ملی وجود دارد.');
                return redirect()->back();
            }

            if ($provider->email !=$request['email'] && $provid->email == $request['email'] && $request['ncode'] !=null){
                session()->flash('danger','ایمیل وارد شده تکراری میباشد . ارائه دهنده ای بااین ایمیل وجود دارد.');
                return redirect()->back();
            }

            if ($provider->mobile !=$request['mobile'] &&$provid->mobile == $request['mobile']&& $request['ncode'] !=null ){
                session()->flash('danger','شماره موبایل وارد شده تکراری میباشد . ارائه دهنده ای بااین موبایل وجود دارد.');
                return redirect()->back();
            }
        }




        $provider->update([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'mobile' => $request->get('mobile'),
            'birthdate' => $dateUp,
            'email' => $request->get('email'),
            'ncode' => $request->get('ncode'),
            'gender' => $request->get('gender'),
            'degree' => $request->get('degree'),
            'address' => $request->get('address'),
            'start' => $request->get('start'),
            'end' => $request->get('end'),
        ]);

        $provider->services()->sync($request['services']);

        return redirect(route('provider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->back();
    }
    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }



    public static function updateStatus(Request $request,Provider $provider){
        $provider->update([
            'status'=> $request->get('status')

        ]);
        if ($provider->status == 'فعال'){
            session()->flash('success','وضعیت فعال شد');

        }
        else{
            session()->flash('danger','وضعیت غیرفعال شد');
        }
        return redirect()->back();
    }
}
