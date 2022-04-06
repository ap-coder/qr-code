<?php

namespace App\Http\Requests;

use App\Models\Download;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDownloadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('download_edit');
    }

    public function rules()
    {
        return [
            'frame_color' => [
                'string',
                'nullable',
            ],
            'frame_text' => [
                'string',
                'nullable',
            ],
        ];
    }
}
