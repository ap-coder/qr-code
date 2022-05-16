<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\QrType;
use App\Models\QrIndustry;

class QrCodePortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('qrcode_portal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrTypes = QrType::published()->get();
        $qrIndustries = QrIndustry::get();
        return view('site.qrcode-portal.create',compact('qrTypes','qrIndustries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qrTypes = QrType::published()->get();
        $qrIndustries = QrIndustry::get();
        return view('site.qrcode-portal.create',compact('qrTypes','qrIndustries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTypePreview(Request $request)
    {
        $qrType=QrType::where('id',$request->id)->first();

        $data['icon']=$qrType->icon_class;

        if ($qrType->mock_image) {
            $data['mock_image']=$qrType->mock_image->getUrl();
        }
        if ($qrType->hover_over_image) {
            $data['hover_over_image']=$qrType->hover_over_image->getUrl();
        }
        echo json_encode($data);
    }

    public function getsocialchannel(Request $request)
    {
        $type=$request->type;

        $rand=rand();
        $html = view('site.qrcode-portal.partials.common.'.$type,compact('rand'))->render();

        $data['html']=$html;

        $socialChannel='<a target="_self" class="channel-container"
        id="channel-item-'.$type.'" href="#channel-item-'.$type.'" random="'.$rand.'">
            <div class="pl-55 pos-relative">
                <div class="channel-bgd-'.$type.' channel-bgd">
                    <i class=""></i>
                </div>
                <div class="channel-prop-container pull-left">
                    <span>
                    <span>
                            <div class="channel-name mb-5">
                                
                            </div>
                            <div class="channel-label">
                                
                            </div>
                        </span>
                    </span>
                </div>
            </div>
        </a>';

        $data['channel']=$socialChannel;
        $data['random']=$rand;

        echo json_encode($data);
    }

    public function uploadCropImage(Request $request)
    {
        $folderPath = public_path('upload/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;

        // dd($imageFullPath);
 
        file_put_contents($imageFullPath, $image_base64);
 
        //  $saveFile = new Picture;
        //  $saveFile->name = $imageName;
        //  $saveFile->save();
    
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }
}
