<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Partner;
use App\Models\Service;
use App\Models\User;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\CalendarUtils;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index',
        [
            'users'=>User::all()
        ]);
    }



    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)
    {

        if ($request['firstname'] == null ){
            session()->flash('danger','فیلد نام نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['lastname'] == null ){
            session()->flash('danger','فیلد نام خانوادگی نمیتواند خالی باشد');
            return redirect()->back();
                }



        if (strlen($request['mobile'])>11 || strlen($request['mobile'])<11){
            session()->flash('danger','تعداد ارقام موبایل شما صحیح نمیباشد');
            return redirect()->back();
        }


        foreach (User::all() as $user){
            if ($user->ncode == $request['ncode'] && $request['ncode'] !=null){
                session()->flash('danger','کد ملی تکراری میباشد . کاربری بااین کد ملی وجود دارد.');
                return redirect()->back();
            }


            if ($user->mobile == $request['mobile'] ){
                session()->flash('danger','شماره موبایل وارد شده تکراری میباشد . کاربری بااین موبایل وجود دارد.');
                return redirect()->back();
            }
        }


        if ($request['password'] != $request['passwordConfirm']){
            session()->flash('danger','رمز های عبور مطابقت ندارند ');
            return redirect()->back();
        }

        $userimage= null;
        if ($request->file('file')){
        $userimage = UploadFile::SingleFile($request->file('file'),'userProfile/');
        }

        $role_id=3;
        if ($request['role_id']){
            $role_id=$request['role_id'];
        }


        $date = CalendarUtils::convertNumbers($request->date_of_birth, true);
        $birthdate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        $user = new User();
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->mobile = $request['mobile'];
        $user->email = $request['email'];
        $user->ncode = $request['ncode'];
        $user->date_of_birth = $birthdate;
        $user->degree = $request['degree'];
        $user->password =bcrypt($request['password']);
        $user->file = $userimage;
        $user->marital_status = $request['marital_status'];

        if ($request->marriage_date) {
            $datemar = CalendarUtils::convertNumbers($request->marriage_date, true);
            $mardate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($datemar))->format('Y-m-d');
            $user->marriage_date = $mardate;
        }

        if ($request['gender']){
            $user->gender=$request['gender'];
        }

        $user->child_status = $request['child_status'];
        $user->address = $request['address'];


        $user->role_id =$role_id;

        $user->save();


        $childDates = collect($request['child-dates']);
        $childDates->each(function ($item) use ($user){

            $date = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish(CalendarUtils::convertNumbers($item, true)))->format('Y-m-d');

            $child = Child::firstOrCreate(
                ['date' => $date]
            );


            $user->children()->attach($child->id);
        });


        session()->flash('success','کاربر با موفقیت ایجاد شد');

        return redirect(route('user.list'));

    }

    public function edit(User $user){
        return view('admin.user.edit',[
            'user'=>$user
        ]);

    }


    public function update(Request $request,User $user){


        if ($request['firstname'] == null ){
            session()->flash('danger','فیلد نام نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['lastname'] == null ){
            session()->flash('danger','فیلد نام خانوادگی نمیتواند خالی باشد');
            return redirect()->back();
        }
        if ($request['email'] == null ){
            session()->flash('danger','فیلد ایمیل نمیتواند خالی باشد');
            return redirect()->back();
        }







        if (strlen($request['mobile']) > 11 || strlen($request['mobile'])<11){
            session()->flash('danger','تعداد ارقام موبایل شما صحیح نمیباشد');
            return redirect()->back();
        }



        foreach (User::all() as $user1){

            if ($user->ncode != $request['ncode'] &&  $user1->ncode == $request['ncode'] && $request['ncode'] !=null){
                session()->flash('danger','کد ملی تکراری میباشد . کاربری بااین کد ملی وجود دارد.');
                return redirect()->back();
            }

            if ($user->email != $request['email'] && $user->email == $request['email'] ){
                session()->flash('danger','ایمیل وارد شده تکراری میباشد . کاربری بااین ایمیل وجود دارد.');
                return redirect()->back();
            }

            if ($user->mobile != $request['mobile'] &&$user->mobile == $request['mobile'] ){
                session()->flash('danger','شماره موبایل وارد شده تکراری میباشد . کاربری بااین موبایل وجود دارد.');
                return redirect()->back();
            }
        }



        $userimage= null;
        if ($request->file('file')){
            $userimage = UploadFile::SingleFile($request->file('file'),'userProfile/');
        }


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
        return redirect(route('user.list'));

    }


        public function contract(User $user)
    {
        return view('admin.user.contract',[
            'user'=>$user,
            'contract'=>Contract::all(),
            'services'=>Service::all(),
            'partners'=>Partner::all()
        ]);
    }

    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }

    public function destroy(User $user)
    {
        $user->children()->delete();
        $user->children()->detach();
        $user->delete();
        return redirect()->back();
    }

    public static function updateStatus(Request $request,User $user){
        $user->update([
            'status'=> $request->get('status')

        ]);
        return redirect()->back();
    }

//    public function destroyChild(User $user,Child $child)
//    {
//        $user->children()->detach($child->id);
//        return redirect()->back();
//    }
}
