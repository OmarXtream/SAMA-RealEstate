<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\InfoRequest;
use App\InfoForm;


class InfoFormController extends Controller
{
    public function index()
    {
        return view('pages.infoForm');
    }


    public function Create(InfoRequest $request)
    {
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

            if(!$Form->save()){
                return redirect()->back()
                ->withErrors(['حدث خطأ ما , حاول مره أخرى']);
            }else{
                return redirect('/thanks');

            }

    }



}
