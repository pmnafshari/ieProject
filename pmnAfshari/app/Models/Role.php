<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];

     public function permissions(){
         return $this->belongsToMany(Permission::class);
     }


     public function hasPermission(Permission $permission){

         return $this->permissions()->where('permission_id',$permission->id)->exists();

     }

    public function users()
    {
        return $this->hasMany(User::class);


    }

}
