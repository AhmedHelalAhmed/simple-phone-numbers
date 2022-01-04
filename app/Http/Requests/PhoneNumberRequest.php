<?php

namespace App\Http\Requests;

use App\Enums\PhoneStatesEnum;
use App\Services\GettingCountriesCodesService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PhoneNumberRequest extends FormRequest
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
            'country_code' => ['nullable', Rule::in((new GettingCountriesCodesService)->execute())],
            'state' => ['nullable', Rule::in(PhoneStatesEnum::getAllowedValues())],
        ];
    }
}
