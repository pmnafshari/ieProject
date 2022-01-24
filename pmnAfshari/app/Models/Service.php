<?php

namespace App\Models;

use App\Helpers\UploadFile\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function contracts()
    {
        return $this->belongsToMany(Contract::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function providers()
    {
        return $this->belongsToMany(Provider::class);
    }



    public function pictures()
    {
        return $this->hasMany(Gallery::class);
    }

    public function addPicture(Request $request,Service $service)
    {
//        if ($request->file('file')){
        $path = UploadFile::SingleFile($request->file('file'),"service-gallery/{$service->title}");
        $this->pictures()->create([
            'path' => $path,
        ]);
    }


    public function deletePicture(Gallery $gallery)
    {
        Storage::delete($gallery->path);
        $gallery->delete();
    }



    public function hasproviders(Provider $provider)
    {
        return $this->providers()
            ->where('provider_id', $provider->id)
            ->exists();
    }


    public static function perPaymentCalculate(Service $service)
    {
        $calculate=$service->price * ($service->prepayment / 100);

        return $calculate;
    }


    public function booking()
    {
        return $this->hasMany(Booking::class);

    }

    public function hasBooking($service,$user){

        return $this->booking()
            ->where('service_id', $service)
            ->where('user_id',$user)
            ->where('status','yes')
            ->exists();
    }
}


