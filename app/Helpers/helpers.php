<?php

use Illuminate\Support\Facades\DB;

function photon_notification($errors){
    
    if(session()->has('message')):
        echo '<div class="alert alert-'.session()->get('type').'">'.session()->get('message').'</div>';
    endif;

    if($errors->any()):
    echo '<div class="alert alert-danger">';
      foreach ($errors->all() as $error):
            echo '<li>'. $error .'</li>';
      endforeach;
    echo '</div>';
    endif;


}



// Image Link

function photon_thumbnail($name){

    $link = substr($name,0,7);

    if($link === "https:/" || $link === "http://" ){
        return $name;
    }elseif($name === null){
        return asset('storage/images/default.jpg');

    }
    return asset('storage/images/'.$name);
}


function photon_image_process($request,$name){

    
    if($request->hasFile($name)){

        $validator = validator()->make($request->all(),[
            $name  => 'image',
       ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $imgName = sprintf('%s.%s',str_random(10),$request->$name->extension());
        
        $request->$name->storeAs('images',$imgName);


    }else{

        $thumbUrl = sprintf("%s_url",$name);
           
            if($request->$thumbUrl){

                //    Thumbnail URl Process Start

                $validator = validator()->make($request->all(),[
                    $thumbUrl  => 'active_url',
               ]);
        
                if($validator->fails()){
        
                    return redirect()->back()->withErrors($validator);
                }

                
                $imgName =  $request->$thumbUrl;

                //    Thumbnail URl Process End
     
            }else{

                $imgName = 'default.jpg';

            }
    


    }

    return $imgName;

}



// Check Selected 

function photon_selected($post,$item){


    return ($post === $item ) ? 'selected' : '';
}


function setting($key){
    
    try{
        $value = DB::table('settings')->where('key',$key)->first()->value;
        return $value;
    }catch(Exception $e){
        return;
    }
}
