<?php

namespace App\Http\Requests;

use App\Models\Hour;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHourRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hour_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hours,id',
        ];
    }
}
