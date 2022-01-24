<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketText;
use App\Models\User;
use App\Models\UserTicket;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ticket.index',[
            'tickets'=>Ticket::all()
        ]);

    }
    public function userTicketList()
    {
        return view('admin.ticket.userTicketList',[
            'Usertickets'=>UserTicket::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    public function userTicketCreate(){
        return view('admin.ticket.userTicket',[
            'users'=>User::all()
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
        if ($request['title'] == null  ){
            session()->flash('danger','عنوان تیکت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['text'] == null  ){
            session()->flash('danger','متن تیکت نمیتواند خالی باشد');
            return redirect()->back();
        }

        $date = CalendarUtils::convertNumbers($request->date, true);
        $createDate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        $ticket= new Ticket();
        $ticket->title = $request['title'];
        $ticket->text = $request['text'];
        $ticket->date = $createDate;
        $ticket->save();

        return redirect(route('ticket.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(UserTicket $ticket)
    {
        return view('admin.ticket.UserTicketShow',[
            'ticket'=>$ticket,
            'ticketTexts'=>TicketText::all()->sortByDesc('created_at')
        ]);
    }

    public function ticketDetail(Ticket $ticket){
        return view('admin.ticket.show',[
            'ticket'=>$ticket,
        ]);
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

    public function textTicket(Request $request,UserTicket $ticket){
        $ticket0=$ticket->id;

        if ($request->get('text') == null  ){
            session()->flash('danger','متن تیکت نمیتواند خالی باشد');
            return redirect()->back();
        }
            TicketText::query()->create([
                'ticket_id' =>$ticket0,
                'text' => $request->get('text'),

            ]);

        return redirect()->back();

    }


    public function storeUserTicket(Request $request)
    {
        if ($request['title'] == null  ){
            session()->flash('danger','عنوان تیکت نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['user_id'] == null  ){
            session()->flash('danger','کاربر مدنظر خود راانتخاب کنید');
            return redirect()->back();
        }
        if ($request->get('text') == null  ){
            session()->flash('danger','متن تیکت نمیتواند خالی باشد');
            return redirect()->back();
        }

        $ticket= new UserTicket();
        $ticket->title = $request['title'];
        $ticket->user_id = $request['user_id'];
        $ticket->save();

        TicketText::query()->create([
            'ticket_id' =>$ticket->id,
            'text' => $request->get('text'),

        ]);

        return redirect(route('userTicketList'));
    }







}
