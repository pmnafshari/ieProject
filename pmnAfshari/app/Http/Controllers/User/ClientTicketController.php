<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketText;
use App\Models\UserTicket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class ClientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function publicIndex()
    {
        return view('user.ticket.publicIndex',[
            'tickets'=>Ticket::all()
        ]);
    }

    public function publicDetail(Ticket $ticket)
    {
        return view('user.ticket.publicDetail',[
            'ticket'=>$ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
//        dd(UserTicket::where('user_id',$user_id)->get());
        return view('user.userTicket.index',[
            'tickets'=>UserTicket::where('user_id',$user_id)->get()

        ]);
    }

    public function detail(UserTicket $ticket){
        return view('user.userTicket.detail',[
            'ticket'=>$ticket,
            'ticketTexts'=>TicketText::all()->sortByDesc('created_at')


        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request ,UserTicket $ticket){

            $ticket0=$ticket->id;
            TicketText::query()->create([
                'ticket_id' =>$ticket0,
                'text' => $request->get('text'),
                'writeBy'=>Auth::id()
            ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function create(){
        return view('user.userTicket.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function newTicket(Request $request)
    {
        $ticket= new UserTicket();
        $ticket->title = $request['title'];
        $ticket->user_id = Auth::id();
        $ticket->createBy = Auth::id();

        $ticket->save();

        TicketText::query()->create([
            'ticket_id' =>$ticket->id,
            'text' => $request->get('text'),
            'writeBy'=>Auth::id()
        ]);

        session()->flash('setClock','تیکت با موفقیت ارسال شد');

        return redirect(route('clientTicketList'));
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

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
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
}
