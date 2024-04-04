<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\parametre;
use Illuminate\Support\Str;


class parametrecontroller extends Controller
{  
    public function setting(){
        $data['getRecord']=parametre::getSingle();
        return view('admin.parametreadmin',$data);
    }
    public function updateSetting(Request $request)
        {
        $setting = parametre::getSingle();
        $setting->paypal = trim($request->paypal);
        if(!empty($request->file('logo'))){
            $ext=$request->file('logo')->getClientOriginalExtension();
            $file=$request->file('logo');
            $randomStr=date('ymdhis').Str::random(10);
            $filename=strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/',$filename);
            $setting->logo=$filename;
        }
        if(!empty($request->file('Fevicon'))){
            $ext=$request->file('Fevicon')->getClientOriginalExtension();
            $file=$request->file('Fevicon');
            $randomStr=date('ymdhis').Str::random(10);
            $Fevicon=strtolower($randomStr).'.'.$ext;
            $file->move('upload/setting/',$Fevicon);
            $setting->Fevicon=$Fevicon;
        }
        $setting->save();
    return redirect()->back()->with('success',"Setting Successfully Updated");
}
}
