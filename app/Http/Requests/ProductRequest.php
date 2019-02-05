<?php

namespace App\Http\Requests;
use \Auth ;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (Auth::user()->typeDeCompte=='pharmacie');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre'=>'required',
            'prix'=>'required|numeric',
            'type'=>'required',
            'imageProduit'=>'required|image|mimes:jpeg,png,jpg'
            //&
        ];
    }
}
