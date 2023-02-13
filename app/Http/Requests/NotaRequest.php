<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            'nama_barang' => ['required'],
            'keterangan' => ['required', 'max:256'],
            'jenis' => ['required', 'in:Leptop,Hp,Bimbel,Printer'],
            'pelanggan_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'jenis.in' => ':attribute harus pilih saalah satu :in',
            'max' => ':attribute melebih :max karakter'
        ];
    }

    public function attributes()
    {
        return [
            'pelanggan_id' => 'pelanggan',
            'nama_barang' => 'Nama Barang'
        ];
    }


}
