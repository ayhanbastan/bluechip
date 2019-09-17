<?php
declare( strict_types = 1 );

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AbstractFormRequest extends FormRequest
{
    public function authorize()
    {

        return true;
    }

    protected function failedValidation(Validator $validator)
    {
    }

    public function toArray()
    {
        if ($this->errors()) {
            throw ( new ValidationException($this->validator) )
                ->redirectTo($this->getRedirectUrl());
        }

        $values = $this->validated();
        return $values;
    }

    public function errors(): array
    {
        return $this->getValidatorInstance()->errors()->toArray();
    }
}