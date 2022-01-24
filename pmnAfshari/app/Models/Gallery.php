<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    use HasFactory;

    protected $guarded=[];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
