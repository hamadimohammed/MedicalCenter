<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Hash;
use Session;
use App\Models\User;
use App\Models\Medecin;



class UserController extends Controller
{
    //
    public function get_login_view(){
        /*if(session('User') && session('Grade')){
            if(session('Grade')=="admin"){
                return view('medecins',['medcins'=>$medcins,'namePage'=>$query->login]);
            }
        }*/
        return view("Login");
    }
    public function login(Request $request){
        $username = $request->input("username");
        $mot_pass = $request->input("password");
        //$query = User::where("login",$username)->all();
        $user=User::where('login',$username)->first();
        if($user==null){
            return redirect('/')->with('message','Compte Intouvable ');
        }
        else{
            if(Hash::check($mot_pass,$user->password)){
                $request->session()->put('User',$user->email);
                $request->session()->put('Grade',$user->grade);
                /*$medcins = Medecin::all();
                $specialite = \DB::table('specialites')->get();*/
                return view('layouts/Main_layout');//,['medcins'=>$medcins,'specialite'=>$specialite]);
            }
            else{
                return redirect('/')->with('message','Compte Intouvable ');
            }
        }
    }
}
