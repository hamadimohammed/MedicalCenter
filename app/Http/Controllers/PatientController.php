<?php

namespace App\Http\Controllers;
use Session;
use Response;
use Log;
use Hash;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function get_patients(){
        if(Session::has('User')&&Session::has('Grade')){
            $user=Session::get('User');
            $patient = Patient::all();
            return view('Patient/Patients',['patients'=>$patient,'user'=>$user]);
        }
    }
    public function get_patient_create_view(){
        if(Session::has('User')&&Session::has('Grade')){
            $user=Session::get('User');
            return view('Patient/PatientCreate');
        }
    }
    public function get_update_patient_view(){

    }

    public function patient_create(Request $request){
        $validator =  Validator::make($request->all(),[
            'nom' => 'required|min:5|max:20|alpha',
            'prenom' => 'required|min:5|max:20|alpha',
            'email' => 'email|unique:Patients|unique:Users',
            'num_sec_soc' => 'numeric|nullable|unique:Patients',
            'date_naissance'=>'required',
            'phone' => 'numeric|nullable',
            'adresse' => 'max:250|nullable|alpha_num',
            'antecedent'=>'alpha_num|max:2048',

            'login' => 'unique:Patients|unique:Users',
            'password' => 'required|max:50',			
            'confirme_password'=>'required|max:50'
        ]);
        //Log::info(print_r($validator, true));


        //Log::error($validator);
        if($validator->fails()){
            $failedRules = $validator->failed();
            //dd($failedRules);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $patient = new Patient;
            $patient->nom=$request->input('nom');
            $patient->prenom=$request->input('prenom');
            $patient->email=$request->input('email');
            $patient->adresse=$request->input('adresse');
            $patient->login=$request->input('login');
            $patient->password=bcrypt($request->input('password'));
            $patient->date_naissance=$request->input('date_naissance');
            $patient->phone=$request->input('phone');    
            $patient->num_sec_soc=$request->input('num_sec_soc');
            if($patient->save()){
                if($request->hasFile('image')){
                    $patients=Patient::where('login', '=', $patient->login)->get();
                    $patient=$patients->first();
                    $image_src="patient_avatar_$patient->id.{$request->image->getClientOriginalExtension()}";    
                    $request->image->storeAs('Images\Patient_Avatars',$image_src);
                    $patient->image_path=$image_src;
                    
                    $patient->save();
                }
                return redirect()->back()->with('success_create_patient',"Votre patient $patient->nom $patient->prenom a ete bien creé");
            }
            else
                return redirect()->back()->with('error_create_patient',"Votre patient $request->input('login') n'a pas pu etre creé");
        }
    }
    public function update_patient(){
        /*$medecin = User::find($request->input('id'));
        $medecin->nom=$request->input('nom');
        $medecin->prenom=$request->input('prenom');
        $medecin->adresse=$request->input('adresse');
        $medecin->email=$request->input('email');
        $medecin->phone=$request->input('telephone');
        $medecin->date_naissance=$request->input('date_naissance');
        $medecin->spec_id=$request->input('spec_id');
        $medecin->grade=$request->input('grade');
        $medecin->save();
        return response()->json($medecin);*/
    }
    
   
    /*******************************************/
    public function disable_patient(Request $request){
        $medecin = User::find($request->input('id'));
        $medecin->enabled='0';
        $medecin->save();
        return response()->json($medecin);
    }

}
