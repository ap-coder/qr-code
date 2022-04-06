<?php

namespace App\Http\Requests;

use App\Models\QrColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQrColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_color_create');
    }

    public function rules()
    {
        return [
            'color' => [
                'string',
                'nullable',
            ],
            'corner_inner' => [
                'string',
                'nullable',
            ],
            'corner_outer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
