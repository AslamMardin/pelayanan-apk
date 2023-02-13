<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelangganRequest extends FormRequest
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
            'nama' => ['required', 'min:2'],
            'nomor' => ['required', 'max:13'],
            'alamat' => ['required'],
            'jenis_kelamin' => ['required', 'in:L,P']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Tidak Boleh Kosong',
            'nama.unique' => ':attribute Sudah ada, tolong Nama lain',
            'jenis_kelamin.in' => ':attribute invalid, Pilih salah satu nya',
            'max' => ':attribute melebihi :max batas'
        ];
    }

    public function attributes()
    {
        return [
            'jenis_kelamin' => 'Jenis Kelamin',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'nomor' => 'No Telpon/WA'
        ];
    }
}
