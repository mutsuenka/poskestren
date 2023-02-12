<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisitVitalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->is_perawat == 1 || auth()->user()->is_dokter == 1)
            return true;
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
            'vital_tekanan_darah' => 'required',
            'vital_nadi' => 'required',
            'vital_suhu' => 'required',
            'vital_respiratory_rate' => 'required',
            'vital_spo' => 'required',
            'vital_vas' => 'required',
            'vital_gcs' => 'required',
            'vital_berat_badan' => 'required',
            'vital_tinggi_badan' => 'required'
        ];
    }
}
