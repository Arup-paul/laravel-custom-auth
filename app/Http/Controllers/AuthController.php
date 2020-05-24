<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
class AuthController extends Controller
{
    //

    public function showRegistration(){
        return view('frontend.register');
    }

    public function processRegistration(Request $request){

       //validation
       $Validator = Validator::make($request->all(),[
        'name' =>'required|min:4',
        'email'=> 'required|email|unique:users',
        'password'=>'required|min:6|confirmed'
       ],[
           'name.required' => 'We Need To Know Your Full Name!',
           'email.required' => 'Must be Your Valid Email!',
           'password.required' => 'Must Strong Password Required!'
       ]);


       if($Validator->fails()){
              return redirect()->back()->withErrors($Validator)->withInput( );
       }

       $data = [
           'name' => $request->input('name'),
           'email' => strtolower($request->input('email')),
           'password' => bcrypt($request->input('password')),
       ];

       try {
          User::create($data);
          session()->flash('msg','User account Created');
          session()->flash('type','success');
          return redirect()->route('userlogin');
       } catch (Exception $e) {
        session()->flash('msg',$e->getMessage());
        session()->flash('type','danger');
          return redirect()->back();
       }



    }

    public function showLogin(){
        return view('frontend.login');
    }

    public function processLogin(Request $request){
        $Validator = Validator::make($request->all(),[
            'email'=> 'required|email',
            'password'=>'required|min:6'
           ]);


           if($Validator->fails()){
                  return redirect()->back()->withErrors($Validator)->withInput( );
           }

           $credentials = $request->except(['_token']);

           if(auth()->attempt($credentials)){
              return redirect()->route('home');
           }
           session()->flash('msg','Invalid credentials');
           session()->flash('type','danger');
           return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        session()->flash('msg','User has been logout');
        session()->flash('type','success');
        return redirect()->route('userlogin');
    }
}
