<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Child;
use App\Models\Contract;
use App\Models\Partner;
use App\Models\Rule;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\CalendarUtils;

class ProfileController extends Controller
{
    public function profile(){
        return view('user.profile.profile',[
            'user'=>Auth::user()
        ]);
    }


    public function update(Request $request,User $user){


        $birthdate=$user->date_of_birth;

        if ($request->get('date_of_birth')){
            $date = CalendarUtils::convertNumbers($request->get('date_of_birth'), true);
            $birthdate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        }


        $mardate=$user->marriage_date;
        if ($request->get('marriage_date')) {
            $datemar = CalendarUtils::convertNumbers($request->get('marriage_date'), true);
            $mardate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($datemar))->format('Y-m-d');
        }

        $role_id=$user->role_id;
        if ($request->get('role_id')){
            $role_id=$request->get('role_id');
        }
        $user->update([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'ncode' => $request->get('ncode'),
            'gender' => $request->get('gender'),
            'date_of_birth' => $birthdate,
            'degree' => $request->get('degree'),
            'marital_status'=>$request->get('marital_status'),
            'marriage_date'=>$mardate,
            'role_id'=>$role_id,
            'child_status' => $request->get('child_status'),
            'address' => $request->get('address'),
        ]);


        $childDates = collect($request['child-dates']);
        $childDates->each(function ($item) use ($user){

            $date = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish(CalendarUtils::convertNumbers($item, true)))->format('Y-m-d');

            $child = Child::firstOrCreate(
                ['date' => $date]
            );

            $user->children()->attach($child->id);

            return redirect()->back();
        });
        session()->flash('setClock','ویرایش پروفایل با موفقیت انجام شد');

        return redirect(route('profile'));

    }
    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }



    public function contract(User $user){

        return view('user.contract.index',[
              'user'=>$user,
              'contract'=>Contract::all(),
              'services'=>Service::all(),
              'partners'=>Partner::all()
          ]);
    }

    public function detail(Contract $contract){

        return view('user.contract.detail',[
            'contract' => $contract,
            'user' => User::all(),
            'services' => Service::all(),
            'partner'=>Partner::all()
        ]);
    }


    public function acceptRule(){
        return view('user.rules.rules',[
            'rules'=>Rule::all()->first()
        ]);
    }

    public function acceptedRule(){
        return redirect(route('login.create'));
    }


}
