<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffTime extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function workTime()
    {
        return $this->hasOne(WorkTime::class);
    }

}
