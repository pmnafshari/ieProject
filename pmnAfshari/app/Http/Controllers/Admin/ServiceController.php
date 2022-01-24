<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index',[
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
        return view('admin.service.create',[
            'branches'=>Branch::all(),
            'providers'=>Provider::all()
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
        if ($request['title']==null){
            session()->flash('danger','عنوان نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['branch_id']== null){
            session()->flash('danger','شاخه خدمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['servicetime']== null){
            session()->flash('danger','مدت زمان خدمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['price']== null ){
            session()->flash('danger','قیمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['prepayment']== null){
            session()->flash('danger','پیش پرداخت نمیتواند خالی باشد');
            return redirect()->back();
        }


        $path=null;
        if ($request->file('file')){
           $path = UploadFile::SingleFile($request->file('file'),"service-gallery/{$request->get('title')}");
        }






        $service = new Service();
        $service->title = $request['title'];
        $service->branch_id = $request['branch_id'];
        $service->servicetime = $request['servicetime'];
        $service->price = $request['price'];
        $service->prepayment = $request['prepayment'];
        $service->period = $request['period'];
        $service->file =$path;

        $service->save();

        $service->providers()->sync($request['providers']);

        session()->flash('success','خدمت موردنظر با موفقیت ایجاد شد');

        return redirect(route('service.index'));

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
    public function edit(Service $service)
    {
        return view('admin.service.edit', [
            'service'=>$service,
            'services'=>Service::all(),
            'branches'=>Branch::all(),
            'providers'=>Provider::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Service $service)
    {
        if ($request['title']==null){
            session()->flash('danger','عنوان نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['branch_id']== null){
            session()->flash('danger','شاخه خدمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['servicetime']== null){
            session()->flash('danger','مدت زمان خدمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['price']== null ){
            session()->flash('danger','قیمت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['prepayment']== null){
            session()->flash('danger','پیش پرداخت نمیتواند خالی باشد');
            return redirect()->back();
        }


        $path = $service->file;
        if ($request->file('file')){
            $path = UploadFile::SingleFile($request->file('file'),"service-gallery/{$request->get('title')}");
        }

        $service->update([
            'branch_id' => $request->get('branch_id'),
            'title' => $request->get('title'),
            'servicetime' => $request->get('servicetime'),
            'price' => $request->get('price'),
            'prepayment' => $request->get('prepayment'),
            'period' => $request->get('period'),
            'file' =>$path,
        ]);
        $service->providers()->sync($request['providers']);

        session()->flash('success','خدمت موردنظر با موفقیت ویرایش شد');

        return redirect(route('service.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back();
    }


    public static function updateStatus(Request $request,Service $service){
        $service->update([
            'status'=> $request->get('status')

        ]);
        if ($service->status == 'فعال'){
            session()->flash('success','وضعیت فعال شد');

        }
        else{
            session()->flash('danger','وضعیت غیرفعال شد');
        }


        return redirect()->back();
    }
}
