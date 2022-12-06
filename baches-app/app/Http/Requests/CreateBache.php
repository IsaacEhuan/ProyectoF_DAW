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
}
