<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffTime;
use App\Models\WorkTime;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function workTimeSet()
    {
        foreach (WorkTime::all() as $workTime){
            if ($workTime->exists){
            return redirect(route('workTimeDetail'));
            }
        }
        return view('admin.plan.workTimeSet');
    }


    public function offTimeSet(WorkTime $workTime)
    {
        return view('admin.plan.OffTimeSet',[
            'workTime'=>$workTime
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function workTimeStore(Request $request)
    {
        //man bayad ykari konam ke kolan yedone worktime bashe
     if ($request->get('start') ==null ){
        session()->flash('danger','ساعت شروع  نمیتواند خالی باشد ');
        return back();
    }
     else if ($request->get('start') ==null ){
        session()->flash('danger','ساعت پایان  نمیتواند خالی باشد ');
        return back();
    }
        $workTime=WorkTime::query()->create([
        'start'=>$request->get('start'),
        'end'=>$request->get('end') ]);
        session()->flash('success','ساعت کاری باموفقیت ذخیره شد ');

        return redirect(route('workTimeDetail'));


//        return view('admin.plan.OffTimeSet',[
//
//            'workTime'=>WorkTime::query()->where('id', $workTime->id)->first()
//
//        ]);
    }

    public function offTimeStore(Request $request)
    {
        foreach (WorkTime::all() as $workTime){
            if ($request->get('start') < $workTime->start ){
                session()->flash('danger','ساعت شروع تعطیلی باید بعد تر از ساعت شروع تعطیلی باشد ');
                return back();
            }
            else if ($request->get('start') ==null ){
                session()->flash('danger','ساعت شروع تعطیلی نمیتواند خالی باشد ');
                return back();
            }

            elseif($request->get('end') > $workTime->end ){
                session()->flash('danger','ساعت پایان تعطیلی باید قبل تر از ساعت پایان تعطیلی باشد ');
                return back();
            }
            else if ($request->get('start') ==null ){
                session()->flash('danger','ساعت پایان تعطیلی نمیتواند خالی باشد ');
                return back();
            }


        }

        OffTime::query()->create([
            'workTime_id'=>'1',
            'start'=>$request->get('start'),
            'end'=>$request->get('end')
        ]);
        session()->flash('success','ساعت تعطیلی باموفقیت ذخیره شد ');

        return redirect(route('workTimeDetail'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.plan.detail',[
            'workTimes'=>WorkTime::all(),
            'offTimes'=>OffTime::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(WorkTime $workTime)
    {
        return view('admin.plan.workTimeEdit',[
            'workTime'=>$workTime
        ]);
    }

    public function editOffTime(WorkTime $workTime)
    {
        return view('admin.plan.offTimeEdit',[
            'offTime'=>OffTime::all()->first->get(),
            'workTime'=>WorkTime::all()->first()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(Request $request, WorkTime $workTime)
    {
        if ($request->get('start') ==null ){
            session()->flash('danger','ساعت شروع  نمیتواند خالی باشد ');
            return back();
        }
        else if ($request->get('start') == null ){
            session()->flash('danger','ساعت پایان  نمیتواند خالی باشد ');
            return back();
        }

        $offTime=OffTime::all();
        foreach ($offTime as $off){
            $off->delete();
        }
        $workTime->update([
            'start'=>$request['start'],
            'end'=>$request['end']
        ]);
        session()->flash('success','ساعت کاری باموفقیت ذخیره شد ');
        return view('admin.plan.detail',[
            'workTimes'=>WorkTime::all(),
            'offTimes'=>OffTime::all()
        ]);

    }

    public function offTimeUpdate(Request $request, OffTime $offTime)
    {

        foreach (OffTime::all() as $offTime){
            if ($request->get('start') > $request->get('end') ){
                session()->flash('danger','ساعت شروع تعطیلی باید قبل تر از ساعت پایان تعطیلی باشد ');
                return back();
            }


        }


        $offTime->update([
            'start'=>$request['start'],
            'end'=>$request['end']
        ]);
        session()->flash('success','ساعت تعطیلی باموفقیت ذخیره شد ');
        return view('admin.plan.detail',[
            'workTimes'=>WorkTime::all(),
            'offTimes'=>OffTime::all()
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {

        $offTime=OffTime::all();
        foreach ($offTime as $off){
            $off->delete();
        }
        return redirect()->back();
    }
}
