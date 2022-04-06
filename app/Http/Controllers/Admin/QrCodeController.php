<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQrCodeRequest;
use App\Http\Requests\StoreQrCodeRequest;
use App\Http\Requests\UpdateQrCodeRequest;
use App\Models\BusinessPage;
use App\Models\QrCode;
use App\Models\QrType;
use App\Models\Vcard;
use App\Models\Website;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QrCodeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('qr_code_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QrCode::with(['types', 'vcards', 'websites', 'business_pages', 'created_by'])->select(sprintf('%s.*', (new QrCode())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qr_code_show';
                $editGate = 'qr_code_edit';
                $deleteGate = 'qr_code_delete';
                $crudRoutePart = 'qr-codes';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('scans', function ($row) {
                return $row->scans ? $row->scans : '';
            });
            $table->editColumn('clicks', function ($row) {
                return $row->clicks ? $row->clicks : '';
            });
            $table->editColumn('short_link', function ($row) {
                return $row->short_link ? $row->short_link : '';
            });
            $table->editColumn('types', function ($row) {
                $labels = [];
                foreach ($row->types as $type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $type->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('vcards', function ($row) {
                $labels = [];
                foreach ($row->vcards as $vcard) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $vcard->qr_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('websites', function ($row) {
                $labels = [];
                foreach ($row->websites as $website) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $website->qr_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('business_pages', function ($row) {
                $labels = [];
                foreach ($row->business_pages as $business_page) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $business_page->qr_name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'types', 'vcards', 'websites', 'business_pages']);

            return $table->make(true);
        }

        return view('admin.qrCodes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qr_code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = QrType::pluck('title', 'id');

        $vcards = Vcard::pluck('qr_name', 'id');

        $websites = Website::pluck('qr_name', 'id');

        $business_pages = BusinessPage::pluck('qr_name', 'id');

        return view('admin.qrCodes.create', compact('business_pages', 'types', 'vcards', 'websites'));
    }

    public function store(StoreQrCodeRequest $request)
    {
        $qrCode = QrCode::create($request->all());
        $qrCode->types()->sync($request->input('types', []));
        $qrCode->vcards()->sync($request->input('vcards', []));
        $qrCode->websites()->sync($request->input('websites', []));
        $qrCode->business_pages()->sync($request->input('business_pages', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $qrCode->id]);
        }

        return redirect()->route('admin.qr-codes.index');
    }

    public function edit(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = QrType::pluck('title', 'id');

        $vcards = Vcard::pluck('qr_name', 'id');

        $websites = Website::pluck('qr_name', 'id');

        $business_pages = BusinessPage::pluck('qr_name', 'id');

        $qrCode->load('types', 'vcards', 'websites', 'business_pages', 'created_by');

        return view('admin.qrCodes.edit', compact('business_pages', 'qrCode', 'types', 'vcards', 'websites'));
    }

    public function update(UpdateQrCodeRequest $request, QrCode $qrCode)
    {
        $qrCode->update($request->all());
        $qrCode->types()->sync($request->input('types', []));
        $qrCode->vcards()->sync($request->input('vcards', []));
        $qrCode->websites()->sync($request->input('websites', []));
        $qrCode->business_pages()->sync($request->input('business_pages', []));

        return redirect()->route('admin.qr-codes.index');
    }

    public function show(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->load('types', 'vcards', 'websites', 'business_pages', 'created_by');

        return view('admin.qrCodes.show', compact('qrCode'));
    }

    public function destroy(QrCode $qrCode)
    {
        abort_if(Gate::denies('qr_code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrCode->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrCodeRequest $request)
    {
        QrCode::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('qr_code_create') && Gate::denies('qr_code_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new QrCode();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
