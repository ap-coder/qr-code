<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\QRcdrFn;
use App\Libraries\QRcdr;
use App\Libraries\Frames;
use App\Models\Website;
use App\Models\QrCode;
use App\Models\SocialChannel;
use App\Models\Social;
use App\Models\Address;
use App\Models\Vcard;
use App\Models\BusinessPage;
use App\Models\BusinessFeatureIcon;
use App\Models\Hour;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DOMDocument;
use XSLTProcessor;
use PDF;
use File;

class QrProcessController extends Controller
{
    public function process(Request $request)
    {
        $qrcode=$this->generateqrcode($request->all()); 
        
        echo $qrcode;
    }

    public function downloadPdf(Request $request)
    {
        $qrcode=public_path('qrcodes')."/".basename($request->f).".svg";

        $image = '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <title>Qr Code</title>
        </head>
        <body>
        <div style="width:100%; text-align: center;"><img style="height: auto; max-width:100%; margin:0 auto;" src="'.$qrcode.'" /></div>
        </body>
        </html>';

        $pdf = PDF::loadHTML($image);
    
        return $pdf->download('qrcodes.pdf');

    }

    public function downloadPng(Request $request)
    {
        
        $imgdata = filter_input(INPUT_POST, 'imgdata', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $filename = filter_input(INPUT_POST, 'filename', FILTER_SANITIZE_STRING);

        if ($imgdata && $filename) {
            $maindir = config('qrcdr.qrcodes_dir').'/';
            $savedir = $maindir;
            $basename = basename($filename, '.png');

            if (file_exists($savedir.$basename.'.svg')) {
                $basename = basename($filename, '.svg');

                if (!file_exists($savedir.$filename)) {
                    if (!file_exists($imgdata)) {
                        $content = file_get_contents($imgdata);
                    }
                    if (!$content) {
                        exit('error');
                    }
                    file_put_contents($savedir.$filename, $content);
                }
                echo $maindir.$filename;
                exit;
            }
            exit('error');
        }
    }

    public function createQrCode(Request $request)
    {
        $data=$request->create;
        if ($data) {
            $qrcodes_dir = config('qrcdr.qrcodes_dir');
            $decoded = json_decode($data);
            $svgheader = '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
            $precontent = $svgheader.$decoded->content;
            
            if (class_exists('DOMDocument') && class_exists('XSLTProcessor')) {
                $xsl = new DOMDocument;
                $xsl->load('sanitize.xsl');
                $proc = new XSLTProcessor;
                $proc->importStyleSheet($xsl);
                $xml = simplexml_load_string($precontent);
                $content = $proc->transformToXML($xml);
            } else {
                $content = $precontent;
            }
    
            $basename = filter_var($decoded->basename, FILTER_UNSAFE_RAW);
    
            if ($content && $basename) {
                $filedir = $qrcodes_dir;
                $filename_path = $filedir.'/'.$basename.'.svg';
                try {
                    $handle = fopen($filename_path, "w");
                    fwrite($handle, $content);
                    fclose($handle);
                } catch (Exception $e) {
                    $response = array('error' => 'Exception: ', $e->getMessage());
                    echo json_encode($response);
                    exit;
                }
                $response = array(
                    'basename' => $basename,
                    'filedir' => url('qrcodes'),
                );
                echo json_encode($response);
            } else {
                $response = array('error' => 'Creation failed');
                echo json_encode($response);
            }
        }
       
    }

    public function generateqrcode($data)
    {
        $output_data = false;

        $outdir = config('qrcdr.qrcodes_dir');
        $PNG_TEMP_DIR = storage_path($outdir);
        $PNG_WEB_DIR = $outdir.'/';

        $getsection = '#link';
        $setbackcolor = $data['backcolor'] ?? '';
        $setbackcolor = $setbackcolor ? $setbackcolor : config('qrcdr.qr_bgcolor');
        
        $setfrontcolor = $data['frontcolor'] ?? '';
        $setfrontcolor = $setfrontcolor ? $setfrontcolor : config('qrcdr.qr_color');

        $optionlogo = $data['optionlogo'] ?? '';
        $no_logo_bg = $data['no_logo_bg'] ?? '';
        $pattern = $data['pattern'] ?? '';
        $radial = $data['radial'] ?? '';

        $markerOut = $data['marker_out'] ?? '';
        $markerIn = $data['marker_in'] ?? '';
        $markerOutColor = $data['marker_out_color'] ?? '';
        $markerInColor = $data['marker_in_color'] ?? '';
        $gradient = $data['gradient'] ?? '';
        $gradient_color = $data['gradient_color'] ?? '';
        $markers_color = $data['markers_color'] ?? '';
        $negative_qr = $data['negative_qr'] ?? '';
        $nopdf = ($gradient || $negative_qr);

        $different_markers_color = $data['different_markers_color'] ?? '';

        if ($different_markers_color) {
            $marker_top_right_outline = $data['marker_top_right_outline'] ?? '';
            $marker_top_right_center = $data['marker_top_right_center'] ?? '';
            $marker_bottom_left_outline = $data['marker_bottom_left_outline'] ?? '';
            $marker_bottom_left_center = $data['marker_bottom_left_center'] ?? '';
        } else {
            $marker_top_right_outline = $marker_bottom_left_outline = $markerOutColor;
            $marker_top_right_center = $marker_bottom_left_center = $markerInColor;
        }

        $outerframe = $data['outer_frame'] ?? '';

        $custom_frame_color = $data['custom_frame_color'] ?? '';
        $framecolor = $data['framecolor'] ?? '';
        $framelabel = $data['framelabel'] ?? '';
        $label_font = $data['label_font'] ?? '';
        $logo_size = $data['logo_size'] ?? '';
        $label_text_size = $data['label-text-size'] ?? '';

        $optionlogo = $optionlogo ? $optionlogo : 'none';
        $outerframe = $outerframe ? $outerframe : 'none';

        $labeltext_color = '#FFFFFF';
        $basecolor = $custom_frame_color ? $framecolor : $setfrontcolor;
        $rgb = QRcdrFn::HTMLToRGB($basecolor);
        $hsl = QRcdrFn::RGBToHSL($rgb);
        if ($hsl->lightness > 185) {
            $labeltext_color = '#000000';
        }

        $bg_image = 'none';
        $transparent_code = $data['transparent_code'] ?? '';
        if ($transparent_code) {
            $bg_image = $data['bg_image'] ?? '';
            $bg_image = $bg_image ? $bg_image : 'none';  
        }

        $optionstyle = array(
            'optionlogo' => $optionlogo,
            'pattern' => $pattern,
            'marker_out' => $markerOut,
            'marker_in' => $markerIn,
            'marker_out_color' => $markerOutColor,
            'marker_in_color' => $markerInColor,
            'marker_top_right_outline' => $marker_top_right_outline,
            'marker_top_right_center' => $marker_top_right_center,
            'marker_bottom_left_outline' => $marker_bottom_left_outline,
            'marker_bottom_left_center' => $marker_bottom_left_center,
            'gradient' => $gradient,
            'gradient_color' => $gradient_color,
            'markers_color' => $markers_color,
            'radial' => $radial,
            'no_logo_bg' => $no_logo_bg,
            'frame' => $outerframe,
            'custom_frame_color' => $custom_frame_color,
            'framecolor' => $framecolor,
            'framelabel' => $framelabel,
            'label_font' => $label_font,
            'labeltext_color' => $labeltext_color,
            'logo_size' => $logo_size,
            'label_text_size' => $label_text_size,
            'transparent_code' => $transparent_code,
            'bg_image' => $bg_image,
            'negative' => $negative_qr,
        );

        $stringbackcolor = $setbackcolor ? $setbackcolor : '#FFFFFF';
        $stringfrontcolor = $setfrontcolor ? $setfrontcolor : '#000000';
        $backcolor = QRcdrFn::hexdecColor($stringbackcolor, '#FFFFFF');
        $frontcolor = QRcdrFn::hexdecColor($stringfrontcolor, '#000000');

        $level = $data['level'] ?? '';
        $level = $level ? $level : config('qrcdr.precision');

        if (in_array($level, array('L','M','Q','H'))) {
            $errorCorrectionLevel = $level;
            if ($optionlogo !== 'none' && $errorCorrectionLevel == 'L') {
                $errorCorrectionLevel = 'M';
            }
        }
        $size = $data['size'] ?? '';
        $size = $size ? $size : 16;
        $matrixPointSize = min(max((int)$size, 4), 32);

        $link = $data['link'] ?? '';

        $output_data = QRcdrFn::validateUrl($link);

        $transparent = $data['transparent'] ?? '';
                
        if ($output_data) {

            $backcolor = $transparent ? 'transparent' : $backcolor;

            // $optionlogo = $optionlogo && $optionlogo !== 'none' ? $optionlogo : false;
            $filename = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize.time());
            $filenamesvg = $filename.'.svg';
            $basename = basename($filenamesvg, '.svg');

            $frames = Frames::frames();

            $codemargin = $outerframe !== 'none' ? $frames[$outerframe]['frame_border'] * 2 + 1 : 2;
            $content = QRcdr::svg($output_data, $filenamesvg, $errorCorrectionLevel, $matrixPointSize, $codemargin, false, $backcolor, $frontcolor, $optionstyle);

            $result = array(
                'basename' => $basename,
                'content' => $content,
                'nopdf' => $nopdf
            );
            $result = json_encode($result);
        } else {
            $result = json_encode(
                array(
                    'errore'=> QRcdrFn::getString('provide_more_data'), 
                    'placeholder' => QRcdrFn::relativePath().QRcdrFn::getConfig('placeholder'),
                )
            );
        }
        return $result;
    }

    public function website(Request $request)
    {
        $websiteData=[
            'qr_name'=> $request->qr_name,
            'website_name'=> $request->qr_name,
            'url'=> $request->url,
            'active'=> 1,
        ];

        if ($request->websiteId) {
            $website=Website::where('id',$request->websiteId)->first();

            if($website->qr_name != $request->qr_name){
                $websiteData['slug'] = SlugService::createSlug(Website::class, 'slug', $request->qr_name);
            }
            $website->update($websiteData);
        } else {
            $websiteData['slug'] = SlugService::createSlug(Website::class, 'slug', $request->qr_name);
            $website = Website::create($websiteData);
        }

        $website->websitesQrCodes()->forceDelete();

        $qrData=[
            'name'=> $request->qr_name,
            'slug' => SlugService::createSlug(QrCode::class, 'slug', $request->qr_name),
            'active'=> 1,
            'published'=> 1,
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->websites()->sync($website->id);

        $qrcodeData=[
            'link'=>$website->url,
        ];

        $qrcode=$this->generateqrcode($qrcodeData);
        
        $result = json_decode($qrcode);

        $result->id=$website->id;
        $result->link=$website->url;

        echo json_encode($result);
    }

    public function socialChannel(Request $request)
    {

        $socialChannelData=[
            'qr_name'=> $request->qr_name,
            'summery'=> $request->summery,
            'active'=> 1,
            'is_sharing'=> $request->is_sharing,
            'is_custom_banner'=> $request->is_custom_banner,
            'primary_color'=> $request->primary_color,
            'button_color'=> $request->button_color,
            'headline'=> $request->headline,
            'banner_color'=> $request->banner_color,
            'existing_banner'=> $request->existing_banner,
        ];

        if ($request->socialId) {
            $socialChannel=SocialChannel::where('id',$request->socialId)->first();

            if($socialChannel->qr_name != $request->qr_name){
                $socialChannelData['slug'] = SlugService::createSlug(SocialChannel::class, 'slug', $request->qr_name);
            }
            $socialChannel->update($socialChannelData);
        } else {
            $socialChannelData['slug'] = SlugService::createSlug(SocialChannel::class, 'slug', $request->qr_name);
            $socialChannel = SocialChannel::create($socialChannelData);
        }

        if($request->is_custom_banner==1){
            // if ($request->bannerImage) {
            //     $socialChannel->addMedia(storage_path('tempUpload/' . basename($request->bannerImage)))->toMediaCollection('header_image');
            // }

            if ($request->input('bannerImage', false)) {
                if (!$socialChannel->header_image || $request->input('bannerImage') !== $socialChannel->header_image->file_name) {
                    if ($socialChannel->header_image) {
                        $socialChannel->header_image->delete();
                    }
                    $socialChannel->addMedia(storage_path('tempUpload/' . basename($request->input('bannerImage'))))->toMediaCollection('header_image');
                }
            } elseif ($socialChannel->header_image) {
                $socialChannel->header_image->delete();
            }
            
        }

        // if ($request->welcomeLogo) {
        //     $socialChannel->addMedia(storage_path('tempUpload/' . basename($request->welcomeLogo)))->toMediaCollection('loading_image');
        // }

        if ($request->input('welcomeLogo', false)) {
            if (!$socialChannel->loading_image || $request->input('welcomeLogo') !== $socialChannel->loading_image->file_name) {
                if ($socialChannel->loading_image) {
                    $socialChannel->loading_image->delete();
                }
                $socialChannel->addMedia(storage_path('tempUpload/' . basename($request->input('welcomeLogo'))))->toMediaCollection('loading_image');
            }
        } elseif ($socialChannel->loading_image) {
            $socialChannel->loading_image->delete();
        }

        $socialChannel->qrcode()->forceDelete();

        $qrData=[
            'name'=> $request->qr_name,
            'slug' => SlugService::createSlug(QrCode::class, 'slug', $request->qr_name),
            'active'=> 1,
            'published'=> 1,
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->socialChannel()->sync($socialChannel->id);

        $socialChannel->socials()->forceDelete();

        $socialIds=array();

        if(count($request->url)>0){
            foreach ($request->url as $key => $url) {
                $socialData=[
                    'url'=>$url,
                    'title'=>$request->social_name[$key],
                    'channel_label'=>$request->channel_label[$key],
                    'social_name'=>$request->social_name[$key],
                    'channel_name'=>$request->social_name[$key],
                    'icon_class'=>$request->icon_class[$key],
                ];
                $social = Social::create($socialData);
               

                $socialIds[]=$social->id;
            }

            $socialChannel->socials()->sync($socialIds);
        }

        $qrcodeData=[
            'link'=>route('qrcode.social-media-preview',$socialChannel->slug),
        ];

        $qrcode=$this->generateqrcode($qrcodeData);
        
        $result = json_decode($qrcode);

        $result->id=$socialChannel->id;
        $result->link=route('qrcode.social-media-preview',$socialChannel->slug);

        echo json_encode($result);
    }

    public function vCardPlus(Request $request)
    {

        if ($request->street_address && $request->is_direction_show==1) {
            $is_direction_show=1;
        }else{
            $is_direction_show=0;
        }

        $vCardData=[
            'qr_name'=> $request->qr_name,
            'summery'=> $request->summery,
            'active'=> 1,
            'is_sharing'=> $request->is_sharing,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'primary_color'=> $request->primary_color,
            'button_color'=> $request->button_color,
            'company'=> $request->company,
            'email'=> $request->email,
            'website_link'=> $request->website_link,
            'home_phone'=> $request->home_phone,
            'mobile_number'=> $request->mobile_number,
            'fax_number'=> $request->fax_number,
            'is_direction_show'=> $is_direction_show,
            'is_show_gradient'=> $request->is_show_gradient,
            'gradient_color'=> $request->is_show_gradient ? $request->gradient_color : '',
            'designation'=> $request->designation,
        ];

        if ($request->vcardId) {
            $Vcard=Vcard::where('id',$request->vcardId)->first();

            if($Vcard->qr_name != $request->qr_name){
                $vCardData['slug'] = SlugService::createSlug(Vcard::class, 'slug', $request->qr_name);
            }
            $Vcard->update($vCardData);
        } else {
            $vCardData['slug'] = SlugService::createSlug(Vcard::class, 'slug', $request->qr_name);
            $Vcard = Vcard::create($vCardData);
        }

        if ($request->street_address)
        {
            $addressData=[
                'street_address'=>$request->street_address,
                'number'=>$request->number,
                'city'=>$request->city,
                'state'=>$request->state,
                'zipcode'=>$request->zipcode,
                'country'=>$request->country,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ];
            $address=Address::create($addressData);

            $Vcard->update(['address_id'=>$address->id]);
        }

        if ($request->input('vcardwelcomeLogo', false)) {
            if (!$Vcard->loading_photo || $request->input('vcardwelcomeLogo') !== $Vcard->loading_photo->file_name) {
                if ($Vcard->loading_photo) {
                    $Vcard->loading_photo->delete();
                }
                $Vcard->addMedia(storage_path('tempUpload/' . basename($request->input('vcardwelcomeLogo'))))->toMediaCollection('loading_photo');
            }
        } elseif ($Vcard->loading_photo) {
            $Vcard->loading_photo->delete();
        }

        if ($request->input('avtarImage', false)) {
            if (!$Vcard->photo || $request->input('avtarImage') !== $Vcard->photo->file_name) {
                if ($Vcard->photo) {
                    $Vcard->photo->delete();
                }
                $Vcard->addMedia(storage_path('tempUpload/' . basename($request->input('avtarImage'))))->toMediaCollection('photo');
            }
        } elseif ($Vcard->photo) {
            $Vcard->photo->delete();
        }

        $Vcard->qrcode()->forceDelete();

        $qrData=[
            'name'=> $request->qr_name,
            'slug' => SlugService::createSlug(QrCode::class, 'slug', $request->qr_name),
            'active'=> 1,
            'published'=> 1,
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->vcard()->sync($Vcard->id);

        $Vcard->socials()->forceDelete();

        $socialIds=array();

        if(isset($request->url) && count($request->url)>0){
            foreach ($request->url as $key => $url) {
                $socialData=[
                    'url'=>$url,
                    'title'=>$request->social_name[$key],
                    'channel_label'=>$request->channel_label[$key],
                    'social_name'=>$request->social_name[$key],
                    'channel_name'=>$request->social_name[$key],
                    'icon_class'=>$request->icon_class[$key],
                ];
                $social = Social::create($socialData);
               

                $socialIds[]=$social->id;
            }

            $Vcard->socials()->sync($socialIds);
        }

        $qrcodeData=[
            'link'=>route('qrcode.vcard-preview',$Vcard->slug),
        ];

        $qrcode=$this->generateqrcode($qrcodeData);
        
        $result = json_decode($qrcode);

        $result->id=$Vcard->id;
        $result->link=route('qrcode.vcard-preview',$Vcard->slug);

        echo json_encode($result);

    }

    public function businessPage(Request $request)
    {
        
        $businessData=[
            'qr_name'=> $request->qr_name,
            'summary'=> $request->summery,
            'active'=> 1,
            'company'=> $request->company,
            'headline'=> $request->headline,
            'primary_color'=> $request->primary_color,
            'button_color'=> $request->button_color,
            'button_text'=> $request->button_text,
            'button_lnk'=> $request->button_lnk,
            'about'=> $request->about,
            'contact_name'=> $request->contact_name,
            'email'=> $request->email,
            'website_link'=> $request->website_link,
            'phone'=> $request->phone,
        ];

        if ($request->businessId) {
            $businessPage=BusinessPage::where('id',$request->businessId)->first();

            if($businessPage->qr_name != $request->qr_name){
                $businessData['slug'] = SlugService::createSlug(BusinessPage::class, 'slug', $request->qr_name);
            }
            $businessPage->update($businessData);
        } else {
            $businessData['slug'] = SlugService::createSlug(BusinessPage::class, 'slug', $request->qr_name);
            $businessPage = BusinessPage::create($businessData);
        }

        if ($request->street_address)
        {
            $addressData=[
                'street_address'=>$request->street_address,
                'number'=>$request->number,
                'city'=>$request->city,
                'state'=>$request->state,
                'zipcode'=>$request->zipcode,
                'country'=>$request->country,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ];
            $address=Address::create($addressData);

            $businessPage->update(['address_id'=>$address->id]);
        }

        if($request->input('bannerImage')=='header.jpg'){
            File::copy(public_path('site/img/' . basename($request->input('bannerImage'))), storage_path('tempUpload/' . basename($request->input('bannerImage'))));
            $businessPage->addMedia(storage_path('tempUpload/' . basename($request->input('bannerImage'))))->toMediaCollection('header_image');
        }else{
            if ($request->input('bannerImage', false)) {
                if (!$businessPage->header_image || $request->input('bannerImage') !== $businessPage->header_image->file_name) {
                    if ($businessPage->header_image) {
                        $businessPage->header_image->delete();
                    }
                    $businessPage->addMedia(storage_path('tempUpload/' . basename($request->input('bannerImage'))))->toMediaCollection('header_image');
                }
            } elseif ($businessPage->header_image) {
                $businessPage->header_image->delete();
            }
        }

        if ($request->input('businesswelcomeLogo', false)) {
            if (!$businessPage->loading_image || $request->input('businesswelcomeLogo') !== $businessPage->loading_image->file_name) {
                if ($businessPage->loading_image) {
                    $businessPage->loading_image->delete();
                }
                $businessPage->addMedia(storage_path('tempUpload/' . basename($request->input('businesswelcomeLogo'))))->toMediaCollection('loading_image');
            }
        } elseif ($businessPage->loading_image) {
            $businessPage->loading_image->delete();
        }

        $businessPage->businessPagesQrCodes()->forceDelete();

        $qrData=[
            'name'=> $request->qr_name,
            'slug' => SlugService::createSlug(QrCode::class, 'slug', $request->qr_name),
            'active'=> 1,
            'published'=> 1,
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->business_pages()->sync($businessPage->id);

        //social icons
        $businessPage->socials()->forceDelete();

        $socialIds=array();

        if(isset($request->url) && count($request->url)>0){
            foreach ($request->url as $key => $url) {
                $socialData=[
                    'url'=>$url,
                    'title'=>$request->social_name[$key],
                    'channel_label'=>$request->channel_label[$key],
                    'social_name'=>$request->social_name[$key],
                    'channel_name'=>$request->social_name[$key],
                    'icon_class'=>$request->icon_class[$key],
                ];
                $social = Social::create($socialData);
               
                $socialIds[]=$social->id;
            }

            $businessPage->socials()->sync($socialIds);
        }

        //feature icons
        BusinessFeatureIcon::where('business_page_id',$businessPage->id)->delete();
        
        if(isset($request->feature_icons) && count($request->feature_icons)>0){
            foreach ($request->feature_icons as $key => $icon) {
                $iconData=[
                    'feature_icon_id'=>$icon,
                    'business_page_id'=>$businessPage->id,
                ];
                $icons = BusinessFeatureIcon::create($iconData);
            }

        }

        //busniess hours

        $businessPage->hours()->forceDelete();

        $hoursIds=array();

        if(isset($request->day) && count($request->day)>0){

            
            foreach ($request->day as $key => $day) {
                foreach ($request->open_time as $key => $open_time) {
                    if(isset($open_time[$day])){

                        $hourData=[
                            'day'=>$day,
                            'open_time'=>$open_time[$day],
                            'closing_time'=>$request->closing_time[$key][$day],
                        ];

                        $Hour = Hour::create($hourData);
                        $hoursIds[]=$Hour->id;
                    }
                }
            }

            $businessPage->hours()->sync($hoursIds);
            
        }

        $qrcodeData=[
            'link'=>route('qrcode.business-preview',$businessPage->slug),
        ];

        $qrcode=$this->generateqrcode($qrcodeData);
        
        $result = json_decode($qrcode);

        $result->id=$businessPage->id;
        $result->link=route('qrcode.business-preview',$businessPage->slug);

        echo json_encode($result);
    }
}