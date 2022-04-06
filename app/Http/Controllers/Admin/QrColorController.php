<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQrColorRequest;
use App\Http\Requests\StoreQrColorRequest;
use App\Http\Requests\UpdateQrColorRequest;
use App\Models\QrColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QrColorController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('qr_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QrColor::query()->select(sprintf('%s.*', (new QrColor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qr_color_show';
                $editGate = 'qr_color_edit';
                $deleteGate = 'qr_color_delete';
                $crudRoutePart = 'qr-colors';

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
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });
            $table->editColumn('color_hex', function ($row) {
                return $row->color_hex ? $row->color_hex : '';
            });
            $table->editColumn('primary', function ($row) {
                return $row->primary ? $row->primary : '';
            });
            $table->editColumn('button', function ($row) {
                return $row->button ? $row->button : '';
            });
            $table->editColumn('gradient', function ($row) {
                return $row->gradient ? $row->gradient : '';
            });
            $table->editColumn('secondary', function ($row) {
                return $row->secondary ? $row->secondary : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.qrColors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qr_color_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrColors.create');
    }

    public function store(StoreQrColorRequest $request)
    {
        $qrColor = QrColor::create($request->all());

        return redirect()->route('admin.qr-colors.index');
    }

    public function edit(QrColor $qrColor)
    {
        abort_if(Gate::denies('qr_color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrColors.edit', compact('qrColor'));
    }

    public function update(UpdateQrColorRequest $request, QrColor $qrColor)
    {
        $qrColor->update($request->all());

        return redirect()->route('admin.qr-colors.index');
    }

    public function show(QrColor $qrColor)
    {
        abort_if(Gate::denies('qr_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrColors.show', compact('qrColor'));
    }

    public function destroy(QrColor $qrColor)
    {
        abort_if(Gate::denies('qr_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrColor->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrColorRequest $request)
    {
        QrColor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
