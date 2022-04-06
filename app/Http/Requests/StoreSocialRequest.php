<?php

namespace App\Http\Requests;

use App\Models\Social;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSocialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'social_name' => [
                'string',
                'nullable',
            ],
            'url' => [
                'string',
                'nullable',
            ],
            'channel_name' => [
                'string',
                'nullable',
            ],
            'icon_class' => [
                'string',
                'nullable',
            ],
        ];
    }
}
