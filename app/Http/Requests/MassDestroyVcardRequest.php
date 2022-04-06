<?php

namespace App\Http\Requests;

use App\Models\Vcard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVcardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vcard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vcards,id',
        ];
    }
}
