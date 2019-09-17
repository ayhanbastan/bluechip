<?php

namespace App\Http\Requests;

class NewCustomerDefinitionRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'musteriNo' => 'required|integer|max:2147483647',
            'musteriName' => 'required|string|max:255'
        ];
    }
}
