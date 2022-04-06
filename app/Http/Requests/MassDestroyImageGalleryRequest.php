<?php

namespace App\Http\Requests;

use App\Models\ImageGallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImageGalleryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('image_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:image_galleries,id',
        ];
    }
}
