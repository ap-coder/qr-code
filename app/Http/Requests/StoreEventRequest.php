<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_create');
    }

    public function rules()
    {
        return [
            'qr_name' => [
                'string',
                'nullable',
            ],
            'organizer' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'required',
            ],
            'sub_title' => [
                'string',
                'nullable',
            ],
            'doortime' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'event_date_time' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'photo' => [
                'array',
            ],
            'attachments' => [
                'array',
            ],
            'signup_deadline' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'link_1' => [
                'string',
                'nullable',
            ],
            'link_1_text' => [
                'string',
                'nullable',
            ],
            'link_2' => [
                'string',
                'nullable',
            ],
            'link_2_text' => [
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
            'venue_name' => [
                'string',
                'nullable',
            ],
            'contact' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
