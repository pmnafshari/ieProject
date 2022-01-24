<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Partner extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function PartnerContractCount(Partner $partner)
    {
        $temp = DB::table('contracts')->where('partner_code', $partner->partner_code)->count();

        return $temp;
    }



     public function TotalAmountContract(Partner $partner)
    {
        $totalprice = DB::table('contracts')->where('partner_code',$partner->partner_code)->sum('total_price');
        $per=$partner->pre_price;
        $total=$totalprice * $per /100 ;
        return $total;
    }


    public function ContractAmount(Partner $partner,Contract $contract)
    {
            $totalprice = DB::table('contracts')->where('partner_code',$partner->partner_code)
                ->where('id',$contract->id)
                ->pluck('total_price')->first();
            $per=$partner->pre_price;
            $amount=$totalprice * $per / 100 ;
            return $amount;
    }

    public static function ContractPartner(Partner $partner)
    {
//        dd(Contract::query()->where('partner_code', $partner->partner_code)->get());
        return
            Contract::query()->where('partner_code', $partner->partner_code)->get();
    }

}
