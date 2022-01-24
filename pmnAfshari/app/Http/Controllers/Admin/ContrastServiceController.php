<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use App\Models\Branch;
use App\Models\Contract;
use App\Models\Partner;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class ContrastServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        return view('admin.contract.index',[
            'users'=>User::all(),
            'contracts'=>Contract::all(),
            'services'=>Service::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contract.create',[
            'contracts'=>Contract::all(),
            'users'=>User::all(),
            'services'=>Service::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        if ($request['contract_code']==null){
            session()->flash('danger','کد قرارداد نمیتواند خالی باشد.');
            return redirect()->back();
        }
        else{
            foreach (Contract::all() as $contract){
                if ($request['contract_code']==$contract->contract_code){
                    session()->flash('danger','کد قرارداد نمیتواند تکراری باشد.');
                    return redirect()->back();
                }
            }
        }


        if ($request['user_id'] == null  ){
            session()->flash('danger','نام کاربر نمیتواند خالی باشد');
            return redirect()->back();
        }


        $date = CalendarUtils::convertNumbers($request->create_date, true);
        $createDate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        $contract = new Contract();
        $contract->user_id = $request['user_id'];
        $contract->contract_code = $request['contract_code'];
        $contract->date = $createDate;
        $contract->total_price = $request['total_price'];
        $contract->contract_text = $request['contract_text'];

        if ($request['partner_code']){
            foreach (Partner::all() as $partner){
                if ($partner->partner_code==$request['partner_code'] AND ($partner->status =='فعال')){
                    $contract->partner_code = $request['partner_code'];
                }
                elseif ($partner->partner_code==$request['partner_code'] AND ($partner->status !='فعال')){
                    $contract->partner_code = "همکار غیرفعال است";
                }


                else    $contract->partner_code = "کدهمکار یافت نشد!";


            }

        }
        else $contract->partner_code=null;


        if ($request->file('cofile')){
            $filePath = UploadFile::SingleFile($request->file('cofile'),'contracts');
            $contract->cofile = $filePath;
        }
        else $contract->cofile = null;


        $contract->save();

        $contract->services()->sync($request['services']);
        session()->flash('setClock','قرارداد با موفقیت ذخیره شد');

        return redirect(route('contract.index'));



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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }
}
