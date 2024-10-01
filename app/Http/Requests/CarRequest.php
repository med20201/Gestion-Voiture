<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "marque"=>"required|max:100",
            "model"=>"required|numeric|min:2010",
            "type"=>"required|in:diesel,essence",
            "prixJ"=>"required|numeric|min:150",
            "vitesse"=>"required|in:automatique,manuelle",
            "image"=>"image|mimes:jpg,png,jpeg|max:8000"

        ];
    }
    public function messages()
    {
         return [
            "marque.required"=>"La Marque est obligatoire",
            "model.required"=>"Le model est obligatoire",
            "marque.max"=>"La marque ne doit pas dépasser 100 caractères!",
            "marque.alpha"=>"La marque ne doit contenir que des lettres",
            "model.min"=>"Le model minimale est 2010 ",
            "prixJ.min"=>"Le prix doit être positif",
            "image.image"=>"Vous devez choisir une image",
            "image.mimes"=>"voici les exentions authorisées: jpg, png ou jpeg",

        ];
    }
}
