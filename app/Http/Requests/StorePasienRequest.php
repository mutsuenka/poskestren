<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StorePasienRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'dob' => 'required',
            'jenis_kelamin' => 'required|in:1,2',
            'nik' => 'nullable|',
            'phone' => 'nullable',
            'alamat' => 'nullable',
            'alergi' => 'required',
            'status_kawin' => 'nullable|boolean',
            'kategori' => 'required',
            // 'no_rekam_medis' => 'nullable',
            'nama_wali' => 'required',
            'agama' => 'required'
        ];
    }
}
