<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\VerifyMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Notifications\PasswordResetNotify;

class AuthController extends Controller
{


    // Show register page

    public function resgisterShow(){

        if(auth()->user()){
        
            return redirect()->route('dashboard');
        }
     
        return view('frontend.auth.register');
    }

    // Register Store

    public function resgisterStore(Request $request){
     


        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $token = str_random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verification_token' => $token,
        ]);

        $user->notify(new VerifyMail($user));
        
        Session::flash('type','success');
        Session::flash('message','Your Registration successfull,Activation link have been sent');

        return redirect()->route('login');

        


    }

    // Email Verification

    public function verify($token){
        
        if($token == null){ // Token Empty
            session()->flash('type','danger');
            session()->flash('message','Token is empty');
            return redirect()->route('login');
        }

        $user = User::where('email_verification_token',$token)->first();

        if(!$user){
            session()->flash('type','danger');
            session()->flash('message','Invalid Token');
            return redirect()->route('login');
        }

        if($user){
            $user->update([
                'email_verification_token' => '',
                'email_verified_at' => Carbon::now()
            ]);
            
            session()->flash('type','success');
            session()->flash('message','You are activated now');
            return redirect()->route('login');
        }



    }


        // Email Verification Again

        public function verifyAgain(){
            if(auth()->user()){
        
                return redirect()->route('dashboard');
            }
            
            return view('frontend.auth.mail-verify-again');
            
        }
    
        // Resend Verification

        public function resendVerification(Request $request){
            
            $validator = Validator::make($request->all(),[
                'email' => 'required|email',
            ]);

            if($validator->fails()){
               return redirect()->back()->withErrors($validator);
            }

            $user = User::where('email',$request->email)->first();
            
            $token = str_random(20);


            if(!$user){

                session()->flash('type','danger');
                session()->flash('message','You entered wrong credential.');
                return redirect()->route('verifyAgain');
            }
            $user->update([
                'email_verification_token' => $token
            ]);

            
            $user->notify(new VerifyMail($user));
            
            session()->flash('type','success');
            session()->flash('message','Email Verification Token Send Again to Your Mail. Check your mail.');
            
            return redirect()->route('verifyAgain');
        }

        // Show login page
    
        public function loginShow(){
            if(auth()->user()){
        
                return redirect()->route('dashboard');
            }
    
            return view('frontend.auth.login');
        }
    
        // Show login page
        
        public function loginStore(Request $request){

            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);
    
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            $user = User::where(
                'email' , $request->email)->first();

            if(!$user){
                session()->flash('type','danger');
                session()->flash('message','User not found');
                return redirect()->route('login');
            }




            if(auth()->attempt($credentials)){

                $verified = auth()->user()->email_verified_at;

                if($verified == null){
                    session()->flash('type','warning');
                    session()->flash('message','Your account is not verified');
                    auth()->logout();
                    return redirect()->route('verifyAgain');
                
                }

                return redirect()->route('dashboard');


            }

            session()->flash('type','danger');
            session()->flash('message','Invalid Credentials');
            return redirect()->route('login');

    
        }

     // Password Reset Token
     
     public function passwordResetToken(){
        return view('frontend.auth.password-reset-token');
     }

    //  Password Reset Token Send

    public function passwordResetTokenSend(Request $request){
        
        // Check User Exists

        $user = User::where('email',$request->email)->first();
        
        if(!$user){

            session()->flash('type','danger');
            session()->flash('message','Email not found');
            return redirect()->route('passwordResetToken');
        }
        
        $token = str_random(20);
        
        $tokenExists = DB::table('password_resets')->where('email',$request->email)->first();
        
        
        if($tokenExists){

            session()->flash('type','danger');
            session()->flash('message','Token Already sent');
            return redirect()->route('passwordResetToken');

        }


        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);



        $user->notify(new PasswordResetNotify($token));

        session()->flash('type','success');
        session()->flash('message','Password Reset Token sent , check your email.');
        return redirect()->route('passwordResetToken');

    }


    // Password Reset 

    public function passwordReset($token){
        
        if($token === null){
            session()->flash('type','danger');
            session()->flash('message','Invalid Token');
            return redirect()->route('login');
        }

        $tokenExists = DB::table('password_resets')->where('token',$token)->first();

        if($tokenExists === null){
            session()->flash('type','danger');
            session()->flash('message','Invalid Token');
            return redirect()->route('login');
        }

        return view('frontend.auth.password-reset',['token'=>$token,'email' => $tokenExists->email]);
    }


    // Password Reset Update 

    public function passwordResetUpdate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }

        $validToken = DB::table('password_resets')->where('token',$request->token)->first();
        
        if(!$validToken){
        
            session()->flash('type','danger');
            session()->flash('message','Invalid Token');
            return redirect()->route('login');
        
        }

        $user = User::where('email',$request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email',$request->email)->delete();

        session()->flash('type','success');
        session()->flash('message','Password Successfully Updated');
        return redirect()->route('login');
        
    }

    // Logout

    public function logout(){
        
        auth()->logout();
        return redirect()->route('login');
    }

}
