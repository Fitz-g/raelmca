<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
            'nom' => 'required|string|min:3|max:60',
            'prenoms' => 'required|string|min:3|max:200',
            'date_naissance' => 'required|date',
            'email' => 'required|email|unique:members',
            'fonction' => 'required|string',
            'phone1' => 'required|regex:/^[0-9]+$/',
            'phone2' => 'nullable|regex:/^[0-9]+$/',
            'pays_id' => 'required|integer',
            'cv' => 'mimes:docx,pdf',
            'photo' => 'mimes:jpeg,bmp,png|image',
            'structure_id' => 'array',
        ];
    }
}
