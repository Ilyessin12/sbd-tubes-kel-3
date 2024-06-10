<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        //diubah tadi field nya dari name sama email ke nama_customer sama email_customer
        return [
            'nama_customer' => ['required', 'string', 'max:255'],
            'email_customer' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Customer::class)->ignore($this->user()->id_customer, 'id_customer')],
        ];
    }
}
