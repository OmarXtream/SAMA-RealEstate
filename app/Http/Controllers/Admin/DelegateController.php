<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Delegate;
use Toastr;

class DelegateController extends Controller
{
     public function index()
    {
        $delegates = Delegate::get();
        return view('admin.delegate.index',compact('delegates'));
    }


    public function create()
    {
        return view('admin.delegate.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',

        ]);


        $delegate = new Delegate();
        $delegate->name   = $request->name;
        $delegate->city   = $request->city;
        $delegate->district = $request->district;
        $delegate->save();

        Toastr::success('message', 'تم إضافة المندوب بنجاح.');
        return redirect()->route('admin.delegates.index');
    }


    
    public function destroy($id)
    {
        $delegate = Delegate::find($id);
        $delegate->delete();

        Toastr::success('message', 'تم حذف المندوب بنجاح');
        return back();
    }


}

