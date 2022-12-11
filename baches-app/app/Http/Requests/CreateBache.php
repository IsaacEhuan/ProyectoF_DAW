<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateBache extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'imagen'=>'required|image|max:5120',
            'latitud'=>'required|numeric',
            'longitud'=>'required|numeric',
            'descripcion'=>'required|max:300'
        ];
    }
    public function messages(){
        return [
            'imagen.image'=>'El archivo ingresado no es una imagen',
            'imagen.max'=>'La imagen pesa mas de 5MB',
            'image.required'=>'Debe de ingresar una imagen',
            'latitud.required'=>'No ha ingresado una latitud',
            'longitud.required'=>'No ha ingresado una longitud',
            'descripcion.required'=>'Debe de ingresar una descripción',
            'descripcion.max'=>'La descripción es demasiodo larga',
        ];
    }
}
