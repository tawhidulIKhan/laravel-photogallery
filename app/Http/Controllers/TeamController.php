<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
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
        $data["teams"] = Team::latest()->paginate(10);
        return view("backend.team.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.team.create');
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
        'name' => 'required|string',
        'content' => 'string',
        ]);
          if($validator->fails()){
             return redirect()->back()->withErrors($validator);
          }
         
          $imgName = \photon_image_process($request,"thumbnail");
        
        
        $post = Team::create([
          'name' => $request->name,
         'slug' => str_slug($request->name),
        'description' => $request->description,
        'thumbnail' => $imgName,
        ]);
        
        
        Session::flash('type','success');
        Session::flash('message','Team Successfully Created');
        
        return redirect()->route('team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view("backend.team.show")->with(["team" => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view("backend.team.edit")->with(["team" => $team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $validation = $request->validate([
            'name' => 'required|string',
        ]);

        
       $imgName = photon_thumbnail($request,"thumbnail");

       if($request->hasFile("thumbnail")){
        $team->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'thumbnail' => $imgName
        ]);

       }else{
        $team->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
        ]);

       }

        return redirect()->route('team.show',$team->slug)->with('status','Album updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        session()->flash('type','success');
        session()->flash('message','Team deleted successfully');
        return redirect()->route('team.index');
    }
}
