<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $guarded=[];

    use HasFactory;

    public function offTime()
    {
        return $this->hasOne(OffTime::class);
    }

    public function hasOffTime(WorkTime $workTime)
    {
        return
        OffTime::where('workTime_id',$workTime->id)->first();

    }

}
