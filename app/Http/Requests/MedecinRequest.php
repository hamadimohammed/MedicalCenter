<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

class MedecinRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|min:5|max:20|alpha',
            'prenom' => 'required|min:5|max:20|alpha',
			'email' => 'required|email',
            'login' => 'required',
            'password' => 'required|max:250',			
            'adderesse' => 'required|max:250',
            'id_spec' => 'required'
        ];
    }
}
