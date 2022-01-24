<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\forgetpassMail;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Morilog\Jalali\CalendarUtils;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function updatePasswordShow(User $user)
    {
        return view('admin.login.updatePassword',[
            'user'=>$user
        ]);
    }




    public function updatePassword(Request $request,User $user)
    {
        $user->update([
            'password'=>bcrypt($request->get('password'))
        ]);
        auth()->login($user);

        return redirect('/');


    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login.login');

    }

    public function register(){

        return view('admin.login.signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $request->validate([
            'login'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ]);

        if (User::where('mobile',$request->get('login'))->exists()){

            $user =User::where('mobile',$request->get('login'))->first();

            if (Hash::check($request->password,$user->password)){
                auth()->login($user);

                if ($user->role->title == 'user'){
                    session()->flash('success','کاربر گرامی خوش آمدید');
                    return view('user.home',$user);
                }
                else{
                    session()->flash('success','کاربر گرامی خوش آمدید');
                    return view('admin.home',$user);
                }

            }
            else {
                session()->flash('danger','رمز ورود شما اشتباه است');
                return redirect()->back();
            }

        }
        elseif (User::where('email',$request->get('login'))->exists()){

            $user =User::where('email',$request->get('login'))->first();

            if (Hash::check($request->password,$user->password)){
                auth()->login($user);

                if ($user->role->title == 'user'){
                    session()->flash('success','کاربر گرامی خوش آمدید');
                    return view('user.home',$user);
                }
                else{
                    session()->flash('success','کاربر گرامی خوش آمدید');
                    return view('admin.home',$user);
                }

            }
            else {
                session()->flash('danger','رمز ورود شما اشتباه است');
                return redirect()->back();
            }

        }
        else{
            session()->flash('info','لطفا ثبت نام  کنید');
            return redirect()->back();

        }



    }

    public function reload(){
        return response()->json(['captcha'=>captcha_img()]);
    }

    public function registerFirst(Request $request){

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


        $date = CalendarUtils::convertNumbers($request->date_of_birth, true);
        $birthdate = CalendarUtils::createDatetimeFromFormat('Y-m-d', $this->convertNumberToEnglish($date))->format('Y-m-d');

        $user = new User();
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->mobile = $request['mobile'];
        $user->email = $request['email'];
        $user->date_of_birth = $birthdate;
        $user->password =bcrypt($request['password']);
        $user->role_id = '3';

        $user->save();

      return redirect(route('acceptRule'));

    }
    function convertNumberToEnglish($str) {
        $arabic_eastern = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        return str_replace($arabic_eastern, $arabic_western, $str);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function forgetPasswordShow()
    {
        return view('admin.login.forgetPassword');
    }



    //code bere be email

    public function sendMail(Request $request)
    {
        $user = null;
        $otp = random_int(11111, 99999);

        $userQuery = User::query()->where('mobile', $request->get('mobile'));

        if ($userQuery->exists()) {
            $user = $userQuery->first();

            $user->update([
                'password' => $otp
            ]);


    $userMobile=$user->mobile;

    $texts="کد صحت سنجی  :  " . $otp;


            $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
        'username' => 'rivassystem',
        'password' => '!R!v@$?14392920',
        'to' => $userMobile,
        'from' => '50004000709170',
        'text' => $texts,
        'isFlash' => false,
    ])->json();


//            Mail::to($user->email)->send(new OtpMail($otp));

            $user = $userQuery->first();




            return view('admin.login.otp', [
                'user' => $user
            ]);
        }


        else {  session()->flash('info','لطفا ثبت نام  کنید');

            return view('admin.login.signUp');
        }




    }





    public function verifyOtp(Request $request,User $user)
    {
        if ($request->get('otp') == $user->password){
            session()->flash('success','رمز جدید خود را انتخاب کنید');
            return view('admin.login.updatePassword',[
                'user'=>$user
            ]);
        }
        elseif($request->get('otp') == null || $request->get('otp') != $user->password){
            session()->flash('danger','کد وارد شده صحیح نیست.');

        }

    }



    public function logout()
    {

        auth()->logout();
        return redirect(route('login.create'));

//        return redirect(route('client.index'));
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
}
