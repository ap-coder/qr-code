<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrCode;
use App\Models\SocialChannel;
use App\Models\Social;

class QrCodePreviewContoller extends Controller
{
    public function socialMediaPreview($slug='')
    {
        if ($slug) {
            $socialChannel=SocialChannel::where('slug',$slug)->first();
        }else{
            $socialChannel=array();
        }
        
        return view('site.qrcode-portal.partials.social-media.preview',compact('socialChannel'));
    }
}
