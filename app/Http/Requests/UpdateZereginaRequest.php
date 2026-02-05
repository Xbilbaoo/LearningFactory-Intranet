<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZereginaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role === 'admin' || $this->user()->role === 'arduraduna';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'izena' => 'required|string|max:255',
            'deskribapena' => 'required|string',
            'estimazioa' => 'required|integer|min:1',
            'hasieraData' => 'required|date',
            'amaieraData' => 'required|date|after:hasieraData',
            'zereginPosizioa' => 'required|integer|min:1',
            'status' => 'required|string',
            'taldeID' => 'required|exists:taldeas,taldeID',
            'faseID' => 'required|exists:faseas,faseID',
            'arduradunID' => 'required|exists:arduradunas,arduradunID',

        ];
    }
}
