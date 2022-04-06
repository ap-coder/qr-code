<?php

namespace App\Http\Requests;

use App\Models\QrColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQrColorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('qr_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:qr_colors,id',
        ];
    }
}
