<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\QRcdrFn;
use App\Libraries\QRcdr;
use App\Models\Website;
use App\Models\QrCode;
use Cviebrock\EloquentSluggable\Services\SlugService;
use DOMDocument;
use XSLTProcessor;

class QrProcessController extends Controller
{
    public function process(Request $request)
    {
        $output_data = false;

        $outdir = config('qrcdr.qrcodes_dir');
        $PNG_TEMP_DIR = storage_path($outdir);
        $PNG_WEB_DIR = $outdir.'/';

        $getsection = '#link';
        $setbackcolor = filter_input(INPUT_POST, "backcolor", FILTER_UNSAFE_RAW);
        $setbackcolor = $setbackcolor ? $setbackcolor : config('qrcdr.qr_bgcolor');

        $setfrontcolor = filter_input(INPUT_POST, "frontcolor", FILTER_UNSAFE_RAW);
        $setfrontcolor = $setfrontcolor ? $setfrontcolor : config('qrcdr.qr_color');

        $optionlogo = filter_input(INPUT_POST, "optionlogo", FILTER_UNSAFE_RAW);
        $no_logo_bg = isset($_POST['no_logo_bg']);
        $pattern = filter_input(INPUT_POST, "pattern", FILTER_UNSAFE_RAW);
        $radial = isset($_POST['radial']);

        $markerOut = filter_input(INPUT_POST, "marker_out", FILTER_UNSAFE_RAW);
        $markerIn = filter_input(INPUT_POST, "marker_in", FILTER_UNSAFE_RAW);
        $markerOutColor = filter_input(INPUT_POST, "marker_out_color", FILTER_UNSAFE_RAW);
        $markerInColor = filter_input(INPUT_POST, "marker_in_color", FILTER_UNSAFE_RAW);
        $gradient = isset($_POST['gradient']);
        $gradient_color = filter_input(INPUT_POST, "gradient_color", FILTER_UNSAFE_RAW);
        $markers_color = isset($_POST['markers_color']);
        $negative_qr = isset($_POST['negative_qr']);
        $nopdf = ($gradient || $negative_qr);

        $different_markers_color = isset($_POST['different_markers_color']);

        if ($different_markers_color) {
            $marker_top_right_outline = filter_input(INPUT_POST, "marker_top_right_outline", FILTER_UNSAFE_RAW);
            $marker_top_right_center = filter_input(INPUT_POST, "marker_top_right_center", FILTER_UNSAFE_RAW);
            $marker_bottom_left_outline = filter_input(INPUT_POST, "marker_bottom_left_outline", FILTER_UNSAFE_RAW);
            $marker_bottom_left_center = filter_input(INPUT_POST, "marker_bottom_left_center", FILTER_UNSAFE_RAW);
        } else {
            $marker_top_right_outline = $marker_bottom_left_outline = $markerOutColor;
            $marker_top_right_center = $marker_bottom_left_center = $markerInColor;
        }

        $outerframe = filter_input(INPUT_POST, "outer_frame", FILTER_UNSAFE_RAW);

        $custom_frame_color = isset($_POST['custom_frame_color']);
        $framecolor = filter_input(INPUT_POST, "framecolor", FILTER_UNSAFE_RAW);
        $framelabel = filter_input(INPUT_POST, "framelabel", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
        $label_font = filter_input(INPUT_POST, "label_font", FILTER_UNSAFE_RAW);
        $logo_size = filter_input(INPUT_POST, "logo_size", FILTER_UNSAFE_RAW);
        $label_text_size = filter_input(INPUT_POST, "label-text-size", FILTER_UNSAFE_RAW);

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
        $transparent_code = isset($_POST['transparent_code']);
        if ($transparent_code) {
            $bg_image = filter_input(INPUT_POST, "bg_image", FILTER_UNSAFE_RAW);
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

        $level = filter_input(INPUT_POST, "level", FILTER_UNSAFE_RAW);
        $level = $level ? $level : config('qrcdr.precision');

        if (in_array($level, array('L','M','Q','H'))) {
            $errorCorrectionLevel = $level;
            if ($optionlogo !== 'none' && $errorCorrectionLevel == 'L') {
                $errorCorrectionLevel = 'M';
            }
        }
        $size = filter_input(INPUT_POST, "size", FILTER_UNSAFE_RAW);
        $size = $size ? $size : 16;
        $matrixPointSize = min(max((int)$size, 4), 32);

        $link = filter_input(INPUT_POST, 'link', FILTER_UNSAFE_RAW);

        $output_data = QRcdrFn::validateUrl($link);

                
        if ($output_data) {

            $backcolor = isset($_POST['transparent']) ? 'transparent' : $backcolor;

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
        echo $result;
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
        ];

        $qrCode = QrCode::create($qrData);

        $qrCode->websites()->sync($website->id);

        $outdir = config('qrcdr.qrcodes_dir');
        $PNG_TEMP_DIR = storage_path($outdir);
        $PNG_WEB_DIR = $outdir.'/';
        
        $level = config('qrcdr.precision');

        if (in_array($level, array('L','M','Q','H'))) {
            $errorCorrectionLevel = $level;
            if ($optionlogo !== 'none' && $errorCorrectionLevel == 'L') {
                $errorCorrectionLevel = 'M';
            }
        }
        $size =16;
        $matrixPointSize = min(max((int)$size, 4), 32);
        ;

        $output_data = QRcdrFn::validateUrl($request->url);
        $backcolor = 'transparent';

        $filename = $PNG_TEMP_DIR.md5($output_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize.time());
        $filenamesvg = $filename.'.svg';
        $basename = basename($filenamesvg, '.svg');

        $codemargin = 'none';

        $stringbackcolor ='#FFFFFF';
        $stringfrontcolor = '#000000';
        $backcolor = QRcdrFn::hexdecColor($stringbackcolor, '#FFFFFF');
        $frontcolor = QRcdrFn::hexdecColor($stringfrontcolor, '#000000');

        $content = QRcdr::svg($output_data, $filenamesvg, $errorCorrectionLevel, $matrixPointSize, $codemargin, false, $backcolor, $frontcolor, '');

        $qrcodes_dir = QRcdrFn::getConfig('qrcodes_dir');
        $decoded = json_decode($data);
        $svgheader = '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';

        $precontent = $svgheader.$content;
        
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
            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
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
                'filedir' => QRcdrFn::relativePath().$qrcodes_dir,
            );
            echo json_encode($response);
        } else {
            $response = array('error' => 'Creation failed');
            echo json_encode($response);
        }
        }
}