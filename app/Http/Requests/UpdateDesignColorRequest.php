<?php

namespace App\Http\Requests;

use App\Models\DesignColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDesignColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('design_color_edit');
    }

    public function rules()
    {
        return [
            'primary' => [
                'string',
                'nullable',
            ],
            'button' => [
                'string',
                'nullable',
            ],
            'secondary' => [
                'string',
                'nullable',
            ],
            'gradient' => [
                'string',
                'nullable',
            ],
            'custom_color' => [
                'string',
                'nullable',
            ],
            'custom_button' => [
                'string',
                'nullable',
            ],
        ];
    }
}
