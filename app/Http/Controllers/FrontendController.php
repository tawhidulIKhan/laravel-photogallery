<?php

namespace App\Http\Controllers;

use App\Team;
use App\Album;
use App\Photo;
use App\Service;
use App\ContactInfo;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function home(){
        $data["albums"] = Album::orderBy('created_at','desc')->get();
        return view('frontend.index',$data);
    }

    // Gallery

    public function gallery($slug){
        $album = Album::where('slug',$slug)->first();
        $data["albums"] = Album::orderBy('created_at','desc')->get();
        $data["title"] = $album->name; 
        $data["photos"] = Photo::where("album_id",$album->id)->get(); 
        return view('frontend.gallery',$data);
    }

    // About

    public function about(){
        $data["albums"] = Album::orderBy('created_at','desc')->get();
        $data["teams"] = Team::orderBy('created_at','desc')->get();
        return view('frontend.about',$data);
    }

    // Contact

    public function contact(){
        $data["infos"] = ContactInfo::orderBy('created_at','desc')->get();
        return view('frontend.contact',$data);
    }

    public function contactForm(Request $request){
        
        $validator = Validator::make($request->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required|string',
            ]);
              if($validator->fails()){
                 return redirect()->back()->withErrors($validator);
              }
    
              Mail::to('tawhid.developer@gmail.com')->send(new ContactForm($request->all()));
              
              session()->flash("type","success");
              session()->flash("message","Mail Send Successfully");
              
              return redirect()->route("contact");
    
    }

    // Service

    public function service(){
        $data["albums"] = Album::orderBy('created_at','desc')->get();
        $data["ourservices"] = Service::all();
        return view('frontend.service',$data);
    }

}
