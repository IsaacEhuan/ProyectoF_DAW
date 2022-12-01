<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuario extends FormRequest
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
            'nombre'=>'required',
            'email'=>'required|email|unique:usuarios,email',
            'contrasena'=>'required|confirmed|min:8'
        ];
    }
    public function messages(){
        return [
            'nombre.required'=>'Debe de ingresar su(s) Nombre(s)',
            'email.required'=>'Debe de ingresar su Correo',
            'email.email'=>'El correo ingresado no es valido',
            'email.unique'=>'El Correo ya ha sido registrado antes',
            'contrasena.required'=>'Debe de ingresar una Contraseña',
            'contrasena.confirmed'=>'Las contraseñas no coinciden'
        ];
    }
}
