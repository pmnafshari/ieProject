<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }

    public function hasServices(Service $service)
    {
        return $this->services()
            ->where('service_id', $service->id)
            ->exists();
    }



    public  function providerClocks(){
        $clocks = collect([]);

        $start = WorkTime::first()->start;
        $end = WorkTime::first()->end;

        for ($clock = $start; $clock <= $end;) {
            if (OffTime::exists()){

                if ((OffTime::first()->start <= $clock && (OffTime::first()->end) <= $clock) ||

                    (OffTime::first()->start >= $clock && (OffTime::first()->end) >= $clock)) {
                    $clocks->push($clock);
                    $time = strtotime($clock);
                    $clock = date("H:i", strtotime('+15 minutes', $time));
                }
                else{
                    $time = strtotime($clock);
                    $clock = date("H:i", strtotime('+15 minutes', $time));
                }

            }


            else
            {
                $clocks->push($clock);
                $time = strtotime($clock);
                $clock = date("H:i", strtotime('+15 minutes', $time));
            }

        }

        return $clocks;

    }

}
