<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QrIndustry;

class SiteController extends Controller
{
    public function qrcode_portal_login()
    {
        $QrIndustries=QrIndustry::get();

        return view('site.pages.qrcode-portal-login.index',compact('QrIndustries'));
    }
}
