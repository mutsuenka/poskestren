<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasienRequest extends FormRequest
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
            'nik' => 'nullable',
            'nama_lengkap' => 'required',
            'nama_wali' => 'required',
            'dob' => 'required',
            'jenis_kelamin' => 'required',
            'status_kawin' => 'required',
            'agama' => 'required',
            'phone' => 'nullable',
            'alamat' => 'nullable',
            'alergi' => 'required'
        ];
    }
}
