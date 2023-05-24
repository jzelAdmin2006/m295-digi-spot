<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:orders,email',
            'credit_card_number' => 'required|digits:16',
            'credit_card_expiration_date' => 'required|size:5|regex:/^\d{2}\/\d{2}$/',
            'total' => 'required|numeric',
            'status' => 'required|in:pending,processing,completed',
            'notes' => 'nullable|string',
        ];
    }
}
