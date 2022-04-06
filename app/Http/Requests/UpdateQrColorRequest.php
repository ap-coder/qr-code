<?php

namespace App\Http\Requests;

use App\Models\QrColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQrColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_color_edit');
    }

    public function rules()
    {
        return [
            'color' => [
                'string',
                'nullable',
            ],
            'color_hex' => [
                'string',
                'nullable',
            ],
            'primary' => [
                'string',
                'nullable',
            ],
            'button' => [
                'string',
                'nullable',
            ],
            'gradient' => [
                'string',
                'nullable',
            ],
            'secondary' => [
                'string',
                'nullable',
            ],
        ];
    }
}
