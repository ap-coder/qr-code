<?php

namespace App\Http\Requests;

use App\Models\QrIndustry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQrIndustryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('qr_industry_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
