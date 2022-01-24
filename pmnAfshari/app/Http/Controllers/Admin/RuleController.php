<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function create()
    {
        if (Rule::all()->first()) {
            return redirect(route('rules.edit'));
        }
        return view('admin.rules.create',);
    }

    public function store(Request $request)
    {
        if ($request['rules'] == null) {
            return redirect()->back();
        }

        Rule::query()->create([
            'rules' => $request->get('rules'),
        ]);
        session()->flash('success', ' قوانین با موفقیت ذخیره شد');

        return redirect("/adminpanel");

    }

    public function edit()
    {
        return view('admin.rules.edit', [
            'rule' => Rule::all()->first()
        ]);
    }

    public function update(Request $request,Rule $rules)
    {
        if ($request['rules'] == null){
            return redirect()->back();
        }

        $rules->update([
            'rules' => $request->get('rules'),
        ]);

        return view('admin.rules.edit', [
            'rule' => Rule::all()->first()
        ]);
    }


}
