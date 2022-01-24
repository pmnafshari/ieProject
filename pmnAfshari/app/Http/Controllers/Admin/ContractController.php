<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContractRequest;
use App\Http\Requests\ContractUpdateRequest;
use App\Models\Branch;
use App\Models\Partner;
use App\Models\User;

use App\Models\Contract;
use App\Models\Service;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function updateStatus(Request $request,Contract $contract){
        $contract->update([
            'status'=> $request->get('status')

        ]);

        if ($contract->status == 'فعال'){
            session()->flash('success','وضعیت فعال شد');

        }
        else{
            session()->flash('danger','وضعیت غیرفعال شد');
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(ContractRequest $request)
    {



    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('admin.contract.detail', [
            'contract' => $contract,
            'users' => User::all(),
            'services' => Service::all(),
            'partner'=>Partner::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('admin.contract.edit', [
            'contract' => $contract,
            'users' => User::all(),
            'services' => Service::all(),
            'partner'=>Partner::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Contract $contract)
    {

        $dateUp = $contract->date;
        if ($request->get('create_date')){
            $date = CalendarUtils::convertNumbers($request->create_date, true);
            $dateUp = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');
        }


        $pathfile = $contract->cofile;
        if ($request->exists('cofile')){
            $pathfile = UploadFile::SingleFile($request->file('cofile'),'contracts');
        }


        $partner_code = $contract->partner_code;
        if ($request->get('partner_code')){
//            dd(1);
            foreach (Partner::all() as $partner){


                if (($partner->partner_code==$request->get('partner_code')) AND ($partner->status =='فعال')){
                    $partner_code =$request->get('partner_code');
                }
                elseif (($partner->partner_code==$request->get('partner_code')) AND ($partner->status !='فعال')){
                    $partner_code = "partner is inactive";
                }

                else    $partner_code = "کدهمکار یافت نشد!";
            }
        }

        if ($request['contract_code']==null){
            session()->flash('danger','کد قرارداد نمیتواند خالی باشد.');
            return redirect()->back();
        }
        else{
            foreach (Contract::all() as $cont){
                if ($request['contract_code']!= $contract->contract_code && $request['contract_code']==$contract->contract_code){
                    session()->flash('danger','کد قرارداد نمیتواند تکراری باشد.');
                    return redirect()->back();
                }
            }
        }
        if ($request['user_id'] == null  ){
            session()->flash('danger','نام کاربر نمیتواند خالی باشد');
            return redirect()->back();
        }



        $contract->update([
            'user_id' => $request->get('user_id'),
            'contract_code' => $request->get('contract_code'),
            'partner_code' => $partner_code,
            'total_price' => $request->get('total_price'),
            'contract_text' => $request->get('contract_text'),
            'cofile' =>$pathfile,
            'date' =>$dateUp
        ]);
        $contract->services()->sync($request['services']);

        session()->flash('setClock','قرارداد با موفقیت ویرایش شد');

        return redirect(route('contract.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->back();
    }
    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }
}
