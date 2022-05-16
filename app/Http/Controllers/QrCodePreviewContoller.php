<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodePreviewContoller extends Controller
{
    public function socialMediaPreview()
    {
        return view('site.qrcode-portal.partials.social-media.preview');
    }
}
