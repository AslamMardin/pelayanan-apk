<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BayarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pengeluaran' => ['required', 'numeric'],
            'pemasukan' => ['required', 'numeric'],
            'garansi' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus jenis Angka',
        ];
    }

    
}
