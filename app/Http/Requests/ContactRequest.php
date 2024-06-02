<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email',
            'company' => 'required|alpha_num',
            'address' => 'required|string',
            'postal_code' => 'required|digits:5',
            'city' => 'required|alpha',
            'status' => 'required|in:Lead,Client,Prospect',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Le prénom est obligatoire.',
            'first_name.alpha' => 'Le prénom ne doit contenir que des lettres.',
            'last_name.required' => 'Le nom est obligatoire.',
            'last_name.alpha' => 'Le nom ne doit contenir que des lettres.',
            'email.required' => 'L\'e-mail est obligatoire.',
            'email.email' => 'Le format de l\'e-mail est invalide.',
            'email.unique' => 'Cet e-mail est déjà utilisé.',
            'company.required' => 'L\'entreprise est obligatoire.',
            'company.alpha_num' => 'L\'entreprise ne doit contenir que des lettres ou des chiffres.',
            'address.required' => 'L\'adresse est obligatoire.',
            'postal_code.required' => 'Le code postal est obligatoire.',
            'postal_code.digits' => 'Le code postal doit contenir exactement 5 chiffres.',
            'city.required' => 'La ville est obligatoire.',
            'city.alpha' => 'La ville ne doit contenir que des lettres.',
            'status.required' => 'Le statut est obligatoire.',
            'status.in' => 'Le statut doit être Lead, Client ou Prospect.',
        ];
    }
}
