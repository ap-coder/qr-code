<?php

namespace App\Http\Requests;

use App\Models\QrType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQrTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_type_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'subtitle' => [
                'string',
                'nullable',
            ],
            'industries.*' => [
                'integer',
            ],
            'industries' => [
                'array',
            ],
            'icon_class' => [
                'string',
                'nullable',
            ],
        ];
    }
}
