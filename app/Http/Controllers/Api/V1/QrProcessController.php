<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\QRcdrFn;
use App\Libraries\QRcdr;
use App\Models\Website;
use App\Models\QrCode;
use App\Models\SocialChannel;
use App\Models\Social;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DOMDocument;
use XSLTProcessor;

class QrProcessController extends Controller
{
    public function process(Request $request)
    {
        $this->generateqrcode($request->all());        
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

                
        if ($output_data) {

            $backcolor = $link ? 'transparent' : $backcolor;

            // $optionlogo = $optionlogo && $optionlogo !== 'none' ? $optionlogo : false;
            $filename = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize.time());
            $filenamesvg = $filename.'.svg';
            $basename = basename($filenamesvg, '.svg');

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
            'slug' => SlugService::createSlug(Website::class, 'slug', $request->qr_name),
            'active'=> 1,
        ];

        $website = Website::create($websiteData);

        $qrData=[
            'name'=> $request->qr_name,
            'slug' => SlugService::createSlug(QrCode::class, 'slug', $request->qr_name),
            'active'=> 1,
            'published'=> 1,
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->websites()->sync($website->id);

        echo json_encode(1);
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

        echo json_encode($result);
    }
}