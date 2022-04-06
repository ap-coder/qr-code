<?php

namespace App\Http\Requests;

use App\Models\QrType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQrTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('qr_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:qr_types,id',
        ];
    }
}
