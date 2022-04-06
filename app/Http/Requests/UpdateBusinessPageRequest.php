<?php

namespace App\Http\Requests;

use App\Models\BusinessPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBusinessPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_page_edit');
    }

    public function rules()
    {
        return [
            'qr_name' => [
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
            'contact_name' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'website_link' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'hours.*' => [
                'integer',
            ],
            'hours' => [
                'array',
            ],
        ];
    }
}
