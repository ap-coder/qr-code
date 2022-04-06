<?php

namespace App\Http\Requests;

use App\Models\Hour;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHourRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hour_edit');
    }

    public function rules()
    {
        return [
            'open_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'closing_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
