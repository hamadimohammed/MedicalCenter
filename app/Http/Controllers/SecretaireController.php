<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\Secretaire;
use Illuminate\Support\Facades\Validator;

class SecretaireController extends Controller
{
    public function get_secretaires(){
        if(Session::has('User')&&Session::has('Grade')){
            $secretaires = Secretaire::all();
            return view('Secretaire/Secretaires',['secretaires'=>$secretaires,'namePage'=>"liste des secretaires"]);
        }
    } 
    public function get_create_secretaire_view(){
        return view('Secretaire/SecretaireCreate');
    }

    public function create_secretaire(Request $request){
        $validator =  Validator::make($request->all(),[
            'nom' => 'required|min:5|max:20|alpha',
            'prenom' => 'required|min:5|max:20|alpha',
            'email' => 'required|email|unique:Users',
            'login' => 'required|unique:Users',
            'password' => 'required|max:250',			
            'adderesse' => 'max:250',
            'phone' => 'max:10'
        ]);
        if($validator->fails()){
            $failedRules = $validator->failed();
            if(isset($failedRules['email']['Unique'])){
               return redirect()->back()->with('email_exist',"Email existe déja ");
            }
            elseif(isset($failedRules['login']['Unique'])){
                return redirect()->back()->with('login_exist',"Email existe déja ");
            }
        }
        else{
            $secretaire = new User;
            $secretaire->nom=$request->input('nom');
            $secretaire->prenom=$request->input('prenom');
            $secretaire->email=$request->input('email');
            $secretaire->addresse=$request->input('addresse');
            $secretaire->login=$request->input('login');
            $secretaire->password=bcrypt($request->input('password'));
            $secretaire->phone=$request->input('phone');    
            $secretaire->grade='secretaire';
            if($secretaire->save()){
                return redirect()->back()->with('success_create',"Votre secretaire $secretaire->nom $secretaire->prenom a ete bien inserer");
            }
            else
                return redirect()->back()->with('error_create',"Votre secretaire $request->input('login') n'a pas pu etre inserer");
        }
    }
}
