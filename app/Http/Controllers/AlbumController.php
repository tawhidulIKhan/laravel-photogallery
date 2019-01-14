<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
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
        $data["albums"] = Album::latest()->paginate(10);
        return view('backend.album.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.album.create');
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
            'name' => 'required|string',
            'bannner' => 'image'
        ]);

        
        $imgName = \photon_image_process($request,"banner");


        Album::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'banner' => $imgName
        ]);

        return redirect()->route('album.index')->with('status','Album successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $data["album"] = $album;
        return view('backend.album.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {   
        $data["album"] = $album;
        return view('backend.album.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $validation = $request->validate([
            'name' => 'required|string',
            'bannner' => 'image'
        ]);

        
        if($request->banner){

            $imgName = sprintf('%s%s.%s',str_random(10),
            md5(time()),
            $request->banner->extension());

            $request->banner->storeAs('images',$imgName);
        }else{
            
            $imgName = $album->banner;
            
        }


        $album->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'banner' => $imgName
        ]);

        return redirect('/home/album')->with('status','Album updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('/home/album')->with('status','Album deleted successfully');
    }



    /**
     * Show frontend Album
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function catshow($slug)
    {

        $data['album'] = Album::where('slug',$slug)->first();
    
        return view('single',$data);
    }

    
}
