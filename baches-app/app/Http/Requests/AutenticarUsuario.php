<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AutenticarUsuario extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'contrasena'=>'required'
        ];
    }
    public function messages(){
        return [
            'contrasena.required'=>'*Debe de ingresar su Contraseña',
            'email.required'=>'*Debe de ingresar su Correo',
            'email.email'=>'*El correo ingresado no es valido',
        ];
    }
}
