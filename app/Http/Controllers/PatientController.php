<?php

namespace App\Http\Controllers;
use Session;
use Response;
use Log;

use App\Models\Patient;
use Illuminate\Http\Request;

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
        return view('');
    }
    public function update_patient(){

    }
}
