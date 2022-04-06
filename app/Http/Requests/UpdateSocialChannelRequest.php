<?php

namespace App\Http\Requests;

use App\Models\SocialChannel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSocialChannelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('social_channel_edit');
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
