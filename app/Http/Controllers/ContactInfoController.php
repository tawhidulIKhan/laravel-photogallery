<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactInfoController extends Controller
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
        $data['infos'] = ContactInfo::orderBy('created_at','desc')->get();
        return view('backend.contactinfo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contactinfo.create');
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
        'title' => 'required|string',
        'description' => 'string'
        ]);
          if($validator->fails()){
             return redirect()->back()->withErrors($validator);
          }

        
        $info = ContactInfo::create([
          'title' => $request->title,
         'slug' => str_slug($request->title),
        'description' => $request->description
        ]);
        
        
        Session::flash('type','success');
        Session::flash('message','Info Successfully Created');
        
        return redirect()->route('contactinfo.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function show($contactInfo)
    {   
        $info = ContactInfo::where('slug',$contactInfo)->first();
        $data['contactInfo'] = $info;
        return view('backend.contactinfo.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit($contactInfo)
    {
        $data["contactinfo"] = ContactInfo::where('slug',$contactInfo)->first();
        return view('backend.contactinfo.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contactInfo)
    {
        $validation = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $info = ContactInfo::where("slug",$contactInfo)->first();

    $info->update([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'description' => $request->description,
    ]);

        
        session()->flash('type','success');
        session()->flash('message','Contact Info Successfully Updated');
        return redirect()->route('contactinfo.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactInfo  $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactInfo $contactInfo)
    {
        //
    }
}
