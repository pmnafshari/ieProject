<?php

namespace App\Models;

use App\Models\admin\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Child extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeBirthday($query)
    {
        return $query->whereRaw('extract(month from date) = ?', [Carbon::today()->month])
            ->whereRaw('extract(day from date) = ?', [Carbon::today()->day])
            ->orderBy ('date', 'asc');
    }
}
