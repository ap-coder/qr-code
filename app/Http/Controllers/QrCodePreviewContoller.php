<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodePreviewContoller extends Controller
{
    public function socialMediaPreview()
    {
        return view('frontend.qrcode-portal.partials.social-media.preview');
    }
}
