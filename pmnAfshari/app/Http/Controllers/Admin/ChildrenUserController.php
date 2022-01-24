<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Morilog\Jalali\CalendarUtils;

class ChildrenUserController extends Controller
{

    public function index()
    {
        return view('admin.user.index',[
            'users'=>User::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',[
            'users'=>User::all(),
            'children'=>Children::all()
        ]);
    }
    public function store(Request $request)
    {
//        dd('i');

        //if ($request->date_of_birth){}
       $date = CalendarUtils::convertNumbers($request->date_of_birth, true);
        $birthdate = CalendarUtils::createDatetimeFromFormat('Y-m-d H:i:s', $this->convertNumberToEnglish($date))->format('Y-m-d  H:i:s');
        $datemar = CalendarUtils::convertNumbers($request->marriage_date, true);
        $mardate = CalendarUtils::createDatetimeFromFormat('Y-m-d H:i:s', $this->convertNumberToEnglish($datemar))->format('Y-m-d  H:i:s');




        $user = new User();
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->mobile = $request['mobile'];
        $user->email = $request['email'];
        $user->ncode = $request['ncode'];
        $user->gender = $request['gender'];
        $user->date_of_birth =$birthdate;
        $user->degree = $request['degree'];
        $user->password = $request['password'];
        $user->repassword = $request['repassword'];
        $user->marital_status = $request['marital_status'];
        $user->marriage_date = $mardate;
        $user->address = $request['address'];
        $user->save();

        $user->children()->sync($request->get('children'));


        return redirect()->back();



    }
    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }
}
