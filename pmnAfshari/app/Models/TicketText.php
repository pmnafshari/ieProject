<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketText extends Model
{
    use HasFactory;
protected $guarded=[];
    public function ticket()
    {
        return $this->belongsTo(TicketText::class);

    }

}

