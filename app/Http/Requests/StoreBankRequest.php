<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
            'count_number' => 'required|string|max:100',
            'amount' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'count_number' => 'número da conta',
            'amount' => 'valor'
        ];
    }
}
