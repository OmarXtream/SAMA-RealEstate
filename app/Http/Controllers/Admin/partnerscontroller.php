<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\partners;
use Toastr;
use Carbon\Carbon;

class partnerscontroller extends Controller
{
    public function index()
    {
        $partners = partners::latest()->get();

        return view('admin.partners.index',compact('partners'));
    }


    public function create()
    {
        return view('admin.partners.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:partners|max:255',
            'img' => 'required|mimes:jpeg,jpg,png'

        ]);


        $img = $request->file('img');
        $slug  = str_slug($request->name);
        $partner = new partners();
        $partner->name = $request->name;
        if(isset($img)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$img->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('partners')){
                Storage::disk('public')->makeDirectory('partners');
            }
            Storage::disk('public')->put('partners/'.$imagename, file_get_contents($img));
            $partner->img = $imagename;

        } 



        $partner->save();
        Toastr::success('message', 'تم الإنشاء بنجاح.');
        return redirect()->route('admin.partners.index');
    }

    public function destroy($id)
    {
        $partner = partners::find($id);
        $partner->delete();

        Toastr::success('message', 'تم حذف الشريك بنجاح');
        return back();
    }

}
