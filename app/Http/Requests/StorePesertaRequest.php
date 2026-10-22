<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePesertaRequest extends FormRequest
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
        if ($this->routeIs('admin.peserta.*') || $this->has('type')) {
            return [
                'name' => 'required|max:255',
                'nik' => 'required|max:255',
                'type' => 'required|in:Relawan',
                'jabatan' => 'required|in:Ompreng,Persiapan,Pengolahan,Pemorsian,Keamanan',
            ];
        }

        return [
            'name' => 'required|max:255',
            'nik' => 'required|max:255',
            'jabatan' => 'required|max:255',
        ];
    }
}
