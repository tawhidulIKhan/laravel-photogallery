<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Album;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $data["photos"] = $user->photos()->paginate(10);
        return view('backend.photo.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data["albums"] = Album::all();
        return view('backend.photo.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'image' => 'image'
        ]);

        $imgName = \photon_image_process($request,'image');

        Photo::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'image' => $imgName,
            'user_id' => auth()->user()->id,
            'album_id' => $request->album_id
        ]);

        return redirect()->route('photo.index')->with('status','Album successfully created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {

        $data["photo"] = $photo;
        return view('backend.photo.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        $data["albums"] = Album::all();
        $data["photo"] = $photo;
        return view('backend.photo.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $gallery)
    {
        $validation = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'title' => 'required|string',
        ]);

        
$imgName = \photon_image_process($request,"thumbnail");

if($request->hasFile("thumbnail")){
    $service->update([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'description' => $request->description,
        'album_id' => $request->album_id
    ]);

}else{
    $service->update([
        'title' => $request->title,
        'slug' => str_slug($request->title),
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imgName,
        'album_id' => $request->album_id
    ]);

}
        
        session()->flash('type','success');
        session()->flash('message','Service Successfully Updated');
        return redirect()->route('service.index');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $gallery)
    {
        $gallery->delete();
        return redirect()->route('photo.index')->with('status','Gallery successfully deleted');
    }
}
