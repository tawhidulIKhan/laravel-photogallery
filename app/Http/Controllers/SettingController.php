<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function __construct(){
        $this->middleware(['role:admin|superadministrator']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['settings'] = Setting::orderBy('created_at','desc')->paginate(10);
        return view('backend.settings.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.settings.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'key' => 'required|string|unique:settings',
            'display_name' => 'required',
            'value' => 'required',
            ]);

            if($validator->fails()){
                 return redirect()->back()->withErrors($validator);
              }
    
    
              
              
            $setting = Setting::create([
              'key' => $request->key,
             'slug' => str_slug($request->key),
            'display_name' => $request->display_name,
            'value' => $request->value
            ]);
            
            Session::flash('type','success');
            Session::flash('message','Setting Successfully Created');
            
            return redirect()->route('settings.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $data["setting"] = $setting;
        return view('backend.settings.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validation = Validator::make($request->all(),[
            'key' => 'required|string',
            'display_name' => 'required',
            'value' => 'required'
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
         }
           


            $setting->update([
                'key' => $request->key,
                'slug' => str_slug($request->key),
                'display_name' => $request->display_name,
                'value' => $request->value
            ]);

                
                session()->flash('type','success');
                session()->flash('message','Setting Successfully Updated');
                return redirect()->route('settings.index');

                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        session()->flash('type','success');
        session()->flash('message','Setting Successfully Deleted');
        return redirect()->route('settings.index');
    }
}
