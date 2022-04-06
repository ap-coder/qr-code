<?php

namespace App\Http\Requests;

use App\Models\QrCode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQrCodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_code_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'scans' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'clicks' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'short_link' => [
                'string',
                'nullable',
            ],
            'types.*' => [
                'integer',
            ],
            'types' => [
                'array',
            ],
            'vcards.*' => [
                'integer',
            ],
            'vcards' => [
                'array',
            ],
            'websites.*' => [
                'integer',
            ],
            'websites' => [
                'array',
            ],
            'business_pages.*' => [
                'integer',
            ],
            'business_pages' => [
                'array',
            ],
        ];
    }
}
