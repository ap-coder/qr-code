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
use Cviebrock\EloquentSluggable\Services\SlugService;
use DOMDocument;
use XSLTProcessor;
use PDF;

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
}