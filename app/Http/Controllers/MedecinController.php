<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use Response;
use Log;

use App\Models\User;
use App\Models\Medecin;
use App\Models\Specialite;

use App\Http\Requests\MedecinRequest;
use Illuminate\Support\Facades\Validator;

class MedecinController extends Controller{
    /*******************************************/
    public function get_medecins_view(){
        if(Session::has('User')&&Session::has('Grade')){
            $login=Session::get('User');
            $medecins = Medecin::all();
            $specialites = Specialite::all();
            return view('Medecin/Medecins',['medecins'=>$medecins,'specialites'=>$specialites,'namePage'=>$login]);
        }
    } 
    /*******************************************/
    public function create_medecin_view(){
        $specialites = Specialite::all();
        return view('Medecin/MedecinCreate',['specialites'=>$specialites]);
    }
    /*******************************************/
    public function update_medecin(Request $request){
        $medecin = User::find($request->input('id'));
        $medecin->nom=$request->input('nom');
        $medecin->prenom=$request->input('prenom');
        $medecin->adresse=$request->input('adresse');
        $medecin->email=$request->input('email');
        $medecin->phone=$request->input('telephone');
        $medecin->date_naissance=$request->input('date_naissance');
        $medecin->spec_id=$request->input('spec_id');
        $medecin->grade=$request->input('grade');
        $medecin->save();
        return response()->json($medecin);
    }
    /*******************************************/
    public function desactiver_medecin(Request $request){
        $medecin = User::find($request->input('id'));
        $medecin->enabled='0';
        $medecin->save();
        return response()->json($medecin);
    }
    /*******************************************/
    public function create_medecin(Request $request){
        $validator =  Validator::make($request->all(),[
            'nom' => 'required|min:5|max:20|alpha',
            'prenom' => 'required|min:5|max:20|alpha',
            //  'title' => "required|unique:posts,title,{$this->post->id}"
            //'email' => "required|email,Rule::unique('Users', 'email')->ignore($this->User)",
            'email' => 'required|email|unique:Users',
            'login' => 'required|unique:Users',
            'password' => 'required|max:250',			
            'adderesse' => 'max:250',
            'specialite' => 'required',
            'date_naissance'=>'required',
            'grade' => 'required',
            'phone' => 'max:10'
        ]);

        if($validator->fails()){
            dd($validator);
            $failedRules = $validator->failed();
            if(isset($failedRules['email']['Unique'])){
               return redirect()->back()->with('email_exist',"Email existe déja ");
            }
            elseif(isset($failedRules['login']['Unique'])){
                return redirect()->back()->with('login_exist',"Le login existe déja ");
            }
            return redirect()->back()->with('error',"Veuiller respecter ");
        }
        else{
            $medecin = new User;
            $medecin->nom=$request->input('nom');
            $medecin->prenom=$request->input('prenom');
            $medecin->email=$request->input('email');
            $medecin->adresse=$request->input('addresse');
            $medecin->login=$request->input('login');
            $medecin->password=bcrypt($request->input('password'));
            $medecin->date_naissance=$request->input('date_naissance');
            $medecin->spec_id=$request->input('specialite');
            $medecin->phone=$request->input('phone');    
            $medecin->grade=$request->input('grade');
            
            if($medecin->save()){
                return redirect()->back()->with('success_create',"Votre medecin $medecin->nom $medecin->prenom a ete bien inserer");
            }
            else
                return redirect()->back()->with('error_create',"Votre medecin $request->input('login') n'a pas pu etre inserer");
        }
    }
}
