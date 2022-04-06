<?php

namespace App\Http\Requests;

use App\Models\DesignColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDesignColorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('design_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:design_colors,id',
        ];
    }
}
