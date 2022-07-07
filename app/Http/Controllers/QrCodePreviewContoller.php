<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialChannel;
use App\Models\Vcard;
use App\Models\BusinessPage;

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

    public function vCardPreview($slug='')
    {
        if ($slug) {
            $vCard=Vcard::where('slug',$slug)->first();
            return view('site.qrcode-portal.partials.vcard-plus.preview',compact('vCard'));
        }else{
            return view('site.qrcode-portal.partials.vcard-plus.demo-preview');
        }        
    }

    public function businessPreview($slug='')
    {
        if ($slug) {
            $businessPage=BusinessPage::where('slug',$slug)->first();
            return view('site.qrcode-portal.partials.business-page.preview',compact('businessPage'));
        }else{
            return view('site.qrcode-portal.partials.business-page.demo-preview');
        }
        
       
    }
}
