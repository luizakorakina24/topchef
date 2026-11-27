<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** Телефон приходит цифрами (79381234567) - приводим к виду 7XXXXXXXXXX. */
    protected function prepareForValidation(): void
    {
        $digits = preg_replace('/\D+/', '', (string) $this->input('phone'));

        if (strlen($digits) === 11 && str_starts_with($digits, '8')) {
            $digits = '7' . substr($digits, 1);
        }

        $this->merge(['phone' => $digits]);
    }

    public function rules(): array
    {
        return [
            'form_id'       => ['nullable', 'string', 'max:50'],
            'page'          => ['nullable', 'string', 'max:255'],
            'locale'        => ['nullable', 'in:ru,en'],
            'service_type'  => ['nullable', 'in:delivery,catering,buffet'],
            'name'          => ['nullable', 'string', 'max:100'],
            'phone'         => ['required', 'regex:/^7\d{10}$/'],
            'email'         => ['nullable', 'email', 'max:255'],
            'event_date'    => ['nullable', 'date'],
            'budget'        => ['nullable', 'string', 'max:100'],
            'comment'       => ['nullable', 'string', 'max:1000'],
            'portions'      => ['nullable', 'integer', 'min:1', 'max:500'],
            'address'       => ['nullable', 'string', 'max:255'],
            'delivery_time' => ['nullable', 'string', 'max:100'],
            'menu_type'     => ['nullable', 'in:standard,business,premium'],
            'event_type'    => ['nullable', 'string', 'max:50'],
            'guests'        => ['nullable', 'integer', 'min:20', 'max:500'],
            'format'        => ['nullable', 'string', 'max:50'],
            'venue'         => ['nullable', 'string', 'max:255'],
            'staff'         => ['nullable', 'string', 'max:50'],
            // скрытое поле-ловушка для ботов (в форме оно невидимо для людей)
            'website'       => ['nullable', 'string', 'max:255'],
        ];
    }
}
