<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::find(1);
        return view('admin.settings.index')->with('setting', $setting);
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone_num' => 'required',
        ]);

        $getsetting = Setting::find(1);
        if($getsetting == null){
            $setting = new Setting();
        }
        else{
            $setting = $getsetting;
        }
       
        $setting->phone_num = $request->input('phone_num');
        $setting->email = $request->input('email');
        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->instagram = $request->input('instagram');
        $setting->linkedin = $request->input('linkedin');
        $setting->address = $request->input('address');

 

        $setting->save();



        return redirect('/settings')->with('success', 'Settings Updated!');

    }


}
