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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return ['name.required' => 'Der Name ist ein Pflichtfeld.',
            'email.required' => 'Die E-Mail-Adresse ist ein Pflichtfeld.',
            'email.email' => 'Die E-Mail-Adresse muss eine gültige E-Mail-Adresse sein.',
            'email.unique' => 'Die E-Mail-Adresse ist bereits vergeben.',
            'credit_card_number.required' => 'Die Kreditkartennummer ist ein Pflichtfeld.',
            'credit_card_number.digits' => 'Die Kreditkartennummer muss 16 Ziffern enthalten.',
            'credit_card_expiration_date.required' => 'Das Ablaufdatum der Kreditkarte ist ein Pflichtfeld.',
            'credit_card_expiration_date.size' => 'Das Ablaufdatum der Kreditkarte muss 5 Zeichen lang sein.',
            'credit_card_expiration_date.regex' => 'Das Ablaufdatum der Kreditkarte muss im Format MM/JJ sein.',
            'total.required' => 'Der Gesamtbetrag ist ein Pflichtfeld.',
            'total.numeric' => 'Der Gesamtbetrag muss eine Zahl sein.',
            'status.required' => 'Der Status ist ein Pflichtfeld.',
            'status.in' => 'Der Status muss einer der folgenden Werte sein: pending, processing, completed.',
            'notes.string' => 'Die Notizen müssen eine Zeichenfolge sein.'];
    }
}
