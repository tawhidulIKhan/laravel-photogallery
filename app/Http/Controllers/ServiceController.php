<?php

namespace App\Http\Controllers;

use App\Album;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
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
        $data['ourservices'] = Service::orderBy('created_at','desc')->get();
        return view('backend.service.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.create');
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
        'description' => 'string',
        'price' => 'string',
        ]);
          if($validator->fails()){
             return redirect()->back()->withErrors($validator);
          }

          $imgName = \photon_image_process($request,"thumbnail");

          
          
        $post = Service::create([
          'title' => $request->title,
         'slug' => str_slug($request->title),
        'description' => $request->description,
        'thumbnail' => $imgName,
        'price' => $request->price
        ]);
        
        Session::flash('type','success');
        Session::flash('message','Service Successfully Created');
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $data['service'] = $service;
        return view('backend.service.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
    
        $data["service"] = $service;
        return view('backend.service.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
    
    
        $validation = $request->validate([
            'title' => 'required|string',
            'price' => 'string'
        ]);

        
$imgName = \photon_image_process($request,"thumbnail");


if($request->hasFile("thumbnail")){

    $service->update([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'description' => $request->description,
        'price' => $request->price,
        'thumbnail' => $imgName
    ]);

}else{
    $service->update([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'price' => $request->price,
        'description' => $request->description,
    ]);

}
        
        session()->flash('type','success');
        session()->flash('message','Service Successfully Updated');
        return redirect()->route('service.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        session()->flash('type','success');
        session()->flash('message','Service Successfully Deleted');
        return redirect()->route('service.index');
    }
}
