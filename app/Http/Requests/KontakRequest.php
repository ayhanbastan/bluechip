<?php
declare( strict_types = 1 );

namespace App\Http\Requests;

class KontakRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'adsoyad'  => 'required|string|min:1|max:255',
            'telefon'  => 'required|numeric|digits:11',
            'email'    => 'required|email|string',
            'pozisyon' => 'required|string|min:1|max:255',
            'sirketId' => 'required|string'

        ];
    }
}