<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClientInfo;
use App\PropertiesRequests;
use App\InfoForm;
use App\Delegate;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Toastr;
use Carbon\Carbon;

class ClientInfoController extends Controller
{
    public function index()
    {
        $infos = ClientInfo::with('delegate')->get(); 

        return view('admin.clientinfo.index', compact('infos'));
    }

    public function create()
    {
        if(request()->has('type') && request()->has('orderID')){
            if(request()->type == 1){
            $request = InfoForm::findOrFail(request()->orderID);

            return view('admin.clientinfo.create', compact('request'));

            }elseif(request()->type == 2){
            $request = PropertiesRequests::findOrFail(request()->orderID);

            return view('admin.clientinfo.create', compact('request'));

            }
        }
            abort(404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'monthly' => 'nullable|string|max:255',
            'timeLeft' => 'nullable|string|max:255',
            'paymentLeft' => 'nullable|string|max:255',
            'Bank' => 'nullable|string|max:255',
            'property' => 'nullable|string|max:255',
            'dateToVisit' => 'nullable|date',
            'payCheckFile' => 'nullable|mimes:pdf,docx',
            'type' => 'required|integer|between:1,2',
            'orderID' => 'required|integer'
        ]);

      
        $payCheckFile = $request->file('payCheckFile');
        $clientInfo = new ClientInfo();
        $clientInfo->monthly = $request->monthly;
        $clientInfo->timeLeft = $request->timeLeft;
        $clientInfo->paymentLeft = $request->paymentLeft;
        $clientInfo->Bank = $request->Bank;
        $clientInfo->property = $request->property;
        $clientInfo->dateToVisit = $request->dateToVisit;

        $clientInfo->bank1 = $request->bank1;
        $clientInfo->bank2 = $request->bank2;
        $clientInfo->bank3 = $request->bank3;
        $clientInfo->bank4 = $request->bank4;
        $clientInfo->bank5 = $request->bank5;
        $clientInfo->bank6 = $request->bank6;
        $clientInfo->bank7 = $request->bank7;

        $clientInfo->details = $request->details;

        if($request->type == 1){

            $ClientRequest = InfoForm::findOrFail($request->orderID);
            $clientInfo->fund_id = $request->orderID;

        }elseif($request->type == 2){
            $ClientRequest = PropertiesRequests::findOrFail($request->orderID);
            $clientInfo->request_id = $request->orderID;

        }

        $clientInfo->type = $request->type;

        if(isset($payCheckFile)){
            $currentDate = Carbon::now()->toDateString();
            $fileName = $currentDate.'-'.uniqid().'.'.$payCheckFile->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('clientInfo')){
                Storage::disk('public')->makeDirectory('clientInfo');
            }
            Storage::disk('public')->put('clientInfo/'.$fileName, file_get_contents($payCheckFile));
            $clientInfo->payCheckFile = $fileName;

        } 



        $clientInfo->save();
        Toastr::success('message', 'تم الإنشاء بنجاح.');
        return redirect()->route('admin.clientinfo.index');
    }

    public function edit($id)
    {
        $clientinfo = ClientInfo::find($id);
        $delegates = Delegate::get();

        return view('admin.clientinfo.edit',compact('clientinfo','delegates'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monthly' => 'nullable|string|max:255',
            'timeLeft' => 'nullable|string|max:255',
            'paymentLeft' => 'nullable|string|max:255',
            'Bank' => 'nullable|string|max:255',
            'property' => 'nullable|string|max:255',
            'dateToVisit' => 'nullable|date',
            'payCheckFile' => 'nullable|mimes:pdf,docx',
            'status' => 'required|integer|between:1,4',

            'bank1' => 'nullable|string|max:255',
            'bank2' => 'nullable|string|max:255',
            'bank3' => 'nullable|string|max:255',
            'bank4' => 'nullable|string|max:255',
            'bank5' => 'nullable|string|max:255',
            'bank6' => 'nullable|string|max:255',
            'bank7' => 'nullable|string|max:255',
            'delegate' => 'nullable|integer|exists:delegates,id',
            'details' => 'nullable|string|max:255',

        ]);


        $clientInfo = ClientInfo::findOrFail($id);
        $clientInfo->monthly = $request->monthly;
        $clientInfo->timeLeft = $request->timeLeft;
        $clientInfo->paymentLeft = $request->paymentLeft;
        $clientInfo->Bank = $request->Bank;
        $clientInfo->property = $request->property;
        $clientInfo->dateToVisit = $request->dateToVisit;
        $clientInfo->status = $request->status;

        $clientInfo->bank1 = $request->bank1;
        $clientInfo->bank2 = $request->bank2;
        $clientInfo->bank3 = $request->bank3;
        $clientInfo->bank4 = $request->bank4;
        $clientInfo->bank5 = $request->bank5;
        $clientInfo->bank6 = $request->bank6;
        $clientInfo->bank7 = $request->bank7;

        $clientInfo->delegate_id = $request->delegate;

        $clientInfo->details = $request->details;


        $payCheckFile = $request->file('payCheckFile');

        if(isset($payCheckFile)){
            $currentDate = Carbon::now()->toDateString();
            $fileName = $currentDate.'-'.uniqid().'.'.$payCheckFile->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('clientInfo')){
                Storage::disk('public')->makeDirectory('clientInfo');
            }
            Storage::disk('public')->put('clientInfo/'.$fileName, file_get_contents($payCheckFile));
            $clientInfo->payCheckFile = $fileName;

        }


        $clientInfo->save();

        Toastr::success('message', 'تم التحديث بنجاح.');
        return redirect()->route('admin.clientinfo.index');
    }

    public function destroy($id)
    {
        $Cinfo = ClientInfo::findOrFail($id);
        $Cinfo->delete();

        Toastr::success('message', 'تم الحذف بنجاح.');
        return redirect()->route('admin.clientinfo.index');
    }


    public function CreateClient()
    {
        $delegates = Delegate::get();
        return view('admin.clientinfo.CreateClient',compact('delegates'));
    }



    public function StoreClient(Request $request)
    {

        $request->validate([
            'name' => ['bail','required', 'string', 'max:255'],
            'email' => ['bail','required', 'string','email', 'max:255'],
            'phone' => ['bail', 'required'],
            'type' => ['bail', 'required', 'integer','between:1,3'],
            'supported' => ['bail','nullable', 'integer','between:1,2'],
            'monthly' => 'nullable|string|max:255',
            'timeLeft' => 'nullable|string|max:255',
            'paymentLeft' => 'nullable|string|max:255',
            'Bank' => 'nullable|string|max:255',
            'property' => 'nullable|string|max:255',
            'dateToVisit' => 'nullable|date',
            'payCheckFile' => 'nullable|mimes:pdf,docx',
            'delegate' => 'nullable|integer|exists:delegates,id',

        ]);


        $Form = InfoForm::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'Age' => $request['Age'],
            'type' => $request['type'],
            'commitments' => $request['commitments'],
            'bank' => $request['bank'],
            'salary' => $request['salary'],
            'salaryTotal' => $request['salaryTotal'],
            'homeAllowance' => $request['homeAllowance'],
            'Allowances' => $request['Allowances'],
            'supported' => $request['supported'],
            'notes' => $request['notes'],
            ]);



            $clientInfo = new ClientInfo();
            $clientInfo->fund_id = $Form->id;
            $clientInfo->type = 1; // infoForm

            $clientInfo->monthly = $request->monthly;
            $clientInfo->timeLeft = $request->timeLeft;
            $clientInfo->paymentLeft = $request->paymentLeft;
            $clientInfo->Bank = $request->Bank;
            $clientInfo->property = $request->property;
            $clientInfo->dateToVisit = $request->dateToVisit;
    
            $clientInfo->bank1 = $request->bank1;
            $clientInfo->bank2 = $request->bank2;
            $clientInfo->bank3 = $request->bank3;
            $clientInfo->bank4 = $request->bank4;
            $clientInfo->bank5 = $request->bank5;
            $clientInfo->bank6 = $request->bank6;
            $clientInfo->bank7 = $request->bank7;
    

            $clientInfo->delegate_id = $request->delegate;

            $clientInfo->details = $request->details;
    
            $payCheckFile = $request->file('payCheckFile');

            if(isset($payCheckFile)){
                $currentDate = Carbon::now()->toDateString();
                $fileName = $currentDate.'-'.uniqid().'.'.$payCheckFile->getClientOriginalExtension();
    
                if(!Storage::disk('public')->exists('clientInfo')){
                    Storage::disk('public')->makeDirectory('clientInfo');
                }
                Storage::disk('public')->put('clientInfo/'.$fileName, file_get_contents($payCheckFile));
                $clientInfo->payCheckFile = $fileName;
    
            } 
    
    
    
            $clientInfo->save();
            Toastr::success('message', 'تم الإنشاء بنجاح.');
            return redirect()->route('admin.clientinfo.index');

    }
}
