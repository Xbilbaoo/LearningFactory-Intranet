<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZereginaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'izena' => 'requiered|string|max:255',
            'deskribapena' => 'requiered|string',
            'estimazioa' => 'required|integer|min:1',
            'hasieraData' => 'required|date',
            'amaieraData' => 'required|date|after:hasieraData',
            'zereginPosizio' => 'required|integer|min:1',
            'status' => 'required|string',
            'taldea' => 'required|exists:taldeas,taldeID',
            'fasea_id' => 'required|exists:faseas,faseID',
            'arduraduna' => 'required|exists:arduradunas,arduradunID',

        ];
    }
}
