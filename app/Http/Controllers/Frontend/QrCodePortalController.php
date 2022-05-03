<?php

namespace App\Http\Controllers\Frontend;

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
        abort_if(Gate::denies('qrcode_portal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.qrcode-portal.index');
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
        return view('frontend.qrcode-portal.create',compact('qrTypes','qrIndustries'));
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

        $html = view('frontend.qrcode-portal.partials.common.'.$type)->render();

        $data['html']=$html;

        echo json_encode($data);
    }
}
