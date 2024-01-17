<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:3', 'max:255', 'unique:projects'],
            'body' => ['nullable'],
            'image' => ['nullable', 'image', 'max:5120'],
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere di almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo di :max caratteri',
            'title.unique' => 'Questo titolo esiste già',
            'image.image' => 'L\'immagine deve essere di tipo image',
            'image.max' => 'L\'immagine deve essere massimo :max'
        ];
    }
}
