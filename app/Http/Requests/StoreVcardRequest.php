<?php

namespace App\Http\Requests;

use App\Models\Vcard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVcardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vcard_create');
    }

    public function rules()
    {
        return [
            'qr_name' => [
                'string',
                'nullable',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'company' => [
                'string',
                'nullable',
            ],
            'headline' => [
                'string',
                'nullable',
            ],
            'button_text' => [
                'string',
                'nullable',
            ],
            'button_lnk' => [
                'string',
                'nullable',
            ],
            'website_link' => [
                'string',
                'nullable',
            ],
            'home_phone' => [
                'string',
                'nullable',
            ],
            'mobile_number' => [
                'string',
                'nullable',
            ],
            'fax_number' => [
                'string',
                'nullable',
            ],
            'hours.*' => [
                'integer',
            ],
            'hours' => [
                'array',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
