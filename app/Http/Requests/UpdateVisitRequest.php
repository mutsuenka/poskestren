<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->is_dokter == 1) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'keluhan_utama' => 'required',
            'riwayat_penyakit_dulu' => 'nullable',
            'riwayat_penyakit_sekarang' => 'nullable',
            'riwayat_penyakit_keluarga' => 'nullable',
            'sg_kepala_leher' => 'nullable',
            'sg_thorax' => 'nullable',
            'sg_cob' => 'nullable',
            'sg_ekstremitas' => 'nullable',
            'diagnosa' => 'required',
            'planning' => 'required'
        ];
    }
}
