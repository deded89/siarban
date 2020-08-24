<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QurbanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'jenis' => 'required',
            'harga' => 'required|numeric',
            'tahun' => 'required|numeric|between:1442,1447',
            'lama' => 'required|numeric|min:1',
            'besar_angsuran' => 'required|min:1',
            'interval_angsuran' => 'required|min:1',
            'tgl_angsuran_pertama' => 'required',
            'max_pequrban' => 'required',
        ];
    }
}
