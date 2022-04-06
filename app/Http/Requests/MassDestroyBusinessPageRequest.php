<?php

namespace App\Http\Requests;

use App\Models\BusinessPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBusinessPageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('business_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:business_pages,id',
        ];
    }
}
