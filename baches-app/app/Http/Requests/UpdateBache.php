<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateBache extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()){
            if(Auth::user()->admin){
                return true;
            }
            if(Auth::user()->id ==$this->id_usuario){
                return true;
            }
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id_usuario'=>'required',
            'id'=>'required',
            'imagen'=>'image|max:5120',
            'latitud'=>'required|numeric',
            'longitud'=>'required|numeric',
            'descripcion'=>'required|max:300'
        ];
    }
}
