<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buying;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){

        return view('admin.order.index',[
            'buying'=>Buying::all()
        ]);
    }



}
