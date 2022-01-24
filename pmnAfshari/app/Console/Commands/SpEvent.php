<?php

namespace App\Console\Commands;

use App\Mail\birthdayMail;
use App\Mail\childBirthdayMail;
use App\Mail\marriageDateMail;
use App\Models\Special;
use App\Models\User;
use App\Models\Child;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SpEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:special';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//        \Log::info("Cron is working fine!");

        $specialsBirthday = Special::where('title', "تاریخ تولد")
            ->where('status', "فعال")
            ->first();

        foreach (User::Birthdays()->get() as $user) {

            $userEmail = $user->email;
            $mobile = $user->mobile;
            $smsText = $specialsBirthday->sms_text;

            $text = $specialsBirthday->text;
            $smsText = $specialsBirthday->sms_text;
            $discount = $specialsBirthday->discount;
            $start_date = $specialsBirthday->start_date;
            $end_date = $specialsBirthday->end_date;
            if ($specialsBirthday->notify_email == 'email'){
                Mail::to($userEmail)->send(new birthdayMail(
                    $text,
                    $discount,
                    $start_date,
                    $end_date
                ));
            }

            if ($specialsBirthday->notify_sms == 'sms'){
                $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                    'username' => 'rivassystem',
                    'password' => '!R!v@$?14392920',
                    'to' => $mobile,
                    'from' => '50004000709170',
                    'text' => $smsText,
                    'isFlash' => false,
                ])->json();
            }

            if ($specialsBirthday->notify_ticket == 'ticket'){
                //send ticket
            }


        }




//user سالگرد ازدواج
        $specialsMarital = Special::where('title', "سالگرد ازدواج")
            ->where('status', "فعال")
            ->first();

        foreach (User::Marital()->get() as $user) {
            $userEmail = $user->get('email');
            $mobileUser = $user->get('mobile');

            $textM = $specialsMarital->text;
            $smsTextM = $specialsMarital->sms_text;
            $discountM = $specialsMarital->discount;
            $start_dateM = $specialsMarital->start_date;
            $end_dateM = $specialsMarital->end_date;

            if ($specialsMarital->notify_email == 'email') {
                Mail::to($userEmail)->send(new marriageDateMail(
                    $textM,
                    $discountM,
                    $start_dateM,
                    $end_dateM
                ));
            }
            if ($specialsMarital->notify_sms == 'sms'){
                $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                    'username' => 'rivassystem',
                    'password' => '!R!v@$?14392920',
                    'to' => $mobileUser,
                    'from' => '50004000709170',
                    'text' => $smsTextM,
                    'isFlash' => false,
                ])->json();
            }

            if ($specialsBirthday->notify_ticket == 'ticket'){
                //send ticket
            }

        }

            //childBirthday
            $specialsChildBirthday = Special::where('title', "تاریخ تولد فرزند")
                ->where('status', "فعال")
                ->first();

            foreach (Child::Birthday() as $child) {
                $parentEmail = $child->users->get('email');
                $mobileParent = $child->user->get('mobile');
                $smsTextCh = $specialsChildBirthday->sms_text;

                $textCh = $specialsChildBirthday->text;
                $discountCh = $specialsChildBirthday->discount;
                $start_dateCh = $specialsChildBirthday->start_date;
                $end_dateCh = $specialsChildBirthday->end_date;

                if ($specialsChildBirthday->notify_email == 'email') {
                Mail::to($parentEmail)->send(new childBirthdayMail(
                    $textCh,
                    $discountCh,
                    $start_dateCh,
                    $end_dateCh
                ));
            }

                if ($specialsChildBirthday->notify_sms == 'sms'){
                    $response = Http::post('https://rest.payamak-panel.com/api/SendSMS/SendSMS', [
                        'username' => 'rivassystem',
                        'password' => '!R!v@$?14392920',
                        'to' => $mobileParent,
                        'from' => '50004000709170',
                        'text' => $smsTextCh,
                        'isFlash' => false,
                    ])->json();
                }

                if ($specialsBirthday->notify_ticket == 'ticket'){
                    //send ticket
                }



            }


        }







}
