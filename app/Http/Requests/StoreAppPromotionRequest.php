<?php

namespace App\Http\Requests;

use App\Models\AppPromotion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppPromotionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('app_promotion_create');
    }

    public function rules()
    {
        return [
            'qr_name' => [
                'string',
                'nullable',
            ],
            'app_name' => [
                'string',
                'nullable',
            ],
            'developer' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'button_text' => [
                'string',
                'nullable',
            ],
            'button_link' => [
                'string',
                'nullable',
            ],
            'button_icon_class' => [
                'string',
                'nullable',
            ],
            'apple_store_link' => [
                'string',
                'nullable',
            ],
            'google_play_link' => [
                'string',
                'nullable',
            ],
            'amazon_app_link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
