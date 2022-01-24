<?php

namespace App\Models;

use App\Mail\OtpMail;
use App\Models\Child;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }


    public function children()
    {
        return $this->belongsToMany(Child::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeBirthdays($query)
    {
        return $query->whereRaw('extract(month from date_of_birth) = ?', [Carbon::today()->month])
            ->whereRaw('extract(day from date_of_birth) = ?', [Carbon::today()->day])
            ->orderBy ('date_of_birth', 'asc');
    }
    public function scopeMarital($query)
    {
        return $query->whereRaw('extract(month from marriage_date) = ?', [Carbon::today()->month])
            ->whereRaw('extract(day from marriage_date) = ?', [Carbon::today()->day])
            ->orderBy ('marriage_date', 'asc');
    }

    public function hasChild(Child $child){

        return $this->children()->where('child_id',$child->id)->exists();

    }

    public function tickets()
    {
        return $this->hasMany(UserTicket::class);


    }


}
