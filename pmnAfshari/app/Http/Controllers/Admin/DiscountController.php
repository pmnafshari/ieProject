<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.discount.index',[
            'discounts'=>Discount::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


        $date_exp = CalendarUtils::convertNumbers($request->exp_date, true);
        $expdate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date_exp))->format('Y-m-d');

        $datecreate = CalendarUtils::convertNumbers($request->create_date, true);
        $createdate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($datecreate))->format('Y-m-d');


        if ($expdate < $createdate){
            session()->flash('danger','تاریخ ایجاد باید کمتر از تاریخ انقضا باشد');
            return redirect()->back();
        }

         if ($request->get('code')==null){
                session()->flash('danger','کد تخفیف نمیتواند خالی باشد.');
                return redirect()->back();
            }


         if ($request->get('discount_toman')==null && $request->get('discount_per')==null){
                session()->flash('danger','مبلغ یا درصد تخفیف نمیتواند خالی باشد.');
                return redirect()->back();
            }



        $use_num=22;
        Discount::query()->create([
            'code' => $request->get('code'),
            'users_number' => $request->get('users_number'),
            'max' => $request->get('max'),
            'exp_date' => $expdate,
            'noeTakhfif' => $request->get('noeTakhfif'),
            'discount_toman' => $request->get('discount_toman'),
            'discount_per' => $request->get('discount_per'),
            'create_date' =>$createdate,
            'use_num'=>$use_num,
        ]);
        session()->flash('success','تخفیف با موفقیت ذخیره شد');

        return redirect(route('discount.index'));
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
    public function edit(Discount $discount)
    {           // dd($discount);

        return view('admin.discount.edit',[
            'discount'=>$discount
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Discount $discount)
    {        $status0=$discount->status;

        $ex_dateUp = $discount->exp_date;
        if ($request->get('exp_date')){

            $date = CalendarUtils::convertNumbers($request->exp_date, true);
            $ex_dateUp = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        }
        $createdateUp = $discount->create_date;
        if ($request->get('create_date')){

            $date = CalendarUtils::convertNumbers($request->create_date, true);
            $createdateUp = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        }


        if ($ex_dateUp < $createdateUp){
            session()->flash('danger','تاریخ ایجاد باید کمتر از تاریخ انقضا باشد');
            return redirect()->back();
        }

        if ($request->get('code')==null){
            session()->flash('danger','کد تخفیف نمیتواند خالی باشد.');
            return redirect()->back();
        }

        foreach (Discount::all() as $dis){
                if($dis->code == $request->get('code')  && $request->get('code')!=$discount->code){
                    session()->flash('danger','کد تخفیف شما تکراری است . کد جدیدی وارد کنید');
                    return redirect()->back();
            }

        }


        if ($request->get('discount_toman')==null && $request->get('discount_per')==null){
            session()->flash('danger','مبلغ یا درصد تخفیف نمیتواند خالی باشد.');
            return redirect()->back();
        }





        $discount->update([
            'code' => $request->get('code'),
            'users_number' => $request->get('users_number'),
            'max' => $request->get('max'),
            'exp_date' => $ex_dateUp,
            'noeTakhfif' => $request->get('noeTakhfif'),
            'discount_toman' => $request->get('discount_toman'),
            'discount_per' => $request->get('discount_per'),
            'create_date' =>$createdateUp,
            'status'=>$status0
        ]);
        session()->flash('success','باموفقیت ویرایش شد');

        return redirect(route('discount.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->back();
    }

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }


    public function updateStatus(Request $request,Discount $discount){
        $discount->update([
            'status'=> $request->get('status')

        ]);

        if ($discount->status == 'فعال'){
            session()->flash('success','وضعیت فعال شد');

        }
        else{
            session()->flash('danger','وضعیت غیرفعال شد');
        }
        return redirect()->back();
    }
}
