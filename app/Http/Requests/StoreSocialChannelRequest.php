<?php

namespace App\Http\Requests;

use App\Models\SocialChannel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSocialChannelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_channel_create');
    }

    public function rules()
    {
        return [
            'qr_name' => [
                'string',
                'nullable',
            ],
            'summery' => [
                'string',
                'max:120',
                'nullable',
            ],
            'socials.*' => [
                'integer',
            ],
            'socials' => [
                'array',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
