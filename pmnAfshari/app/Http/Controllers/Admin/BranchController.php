<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Service;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.branch.index',[
            'branches'=>Branch::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($request['title']==null){
            session()->flash('danger','عنوان شاخه خدمت نمیتواند خالی باشد.');
            return redirect()->back();
        }
        if ($request['file']==null){
            session()->flash('danger','آیکون شاخه خدمت نمیتواند خالی باشد.');
            return redirect()->back();
        }

        $date = CalendarUtils::convertNumbers($request->create_date, true);
        $createDate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');


        if ($request->file('file')){
            $iconPath = UploadFile::SingleFile($request->file('file'),'BrachIcon');
        }

        Branch::query()->create([
            'title' => $request->get('title'),
            'create_date' =>$createDate,
            'icon'=>$iconPath,

        ]);
        session()->flash('success','شاخه موردنظر با موفقیت ذخیره شد');

        return redirect(route('branch.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('admin.branch.service',[
            'branch'=>$branch,
            'service'=>Service::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

        public function edit(Branch $branch)
    {
        return view('admin.branch.edit', [
            'branch' => $branch
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Branch $branch)
    {
        if ($request['title']==null && $request['title'] !=$branch->title){
            session()->flash('danger','عنوان شاخه خدمت نمیتواند خالی باشد.');
            return redirect()->back();
        }


        $dateUp = $branch->create_date;
        if ($request->get('create_date')){

            $date = CalendarUtils::convertNumbers($request->create_date, true);
            $dateUp = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        }


        $iconPath = $branch->icon;

        if ($request->hasFile('file')){

            $iconPath = UploadFile::SingleFile($request->file('file'),'BrachIcon');

        }

        $branch->update([
            'title' => $request->get('title'),
            'create_date' =>$dateUp,
            'icon'=>$iconPath,
        ]);
        session()->flash('success','شاخه موردنظر با موفقیت ویرایش شد');

        return redirect(route('branch.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Branch $branch)
    {
        $branch->services()->delete();
        $branch->delete();
        return redirect()->back();
    }

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }


    public static function updateStatus(Request $request,Branch $branch){
        $branch->update([
            'status'=> $request->get('status')

        ]);
        session()->flash('danger','شاخه موردنظر با موفقیت حذف شد');

        return redirect()->back();
    }
}
