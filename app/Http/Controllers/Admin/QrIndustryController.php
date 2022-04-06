<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQrIndustryRequest;
use App\Http\Requests\StoreQrIndustryRequest;
use App\Http\Requests\UpdateQrIndustryRequest;
use App\Models\QrIndustry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QrIndustryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('qr_industry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QrIndustry::query()->select(sprintf('%s.*', (new QrIndustry())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qr_industry_show';
                $editGate = 'qr_industry_edit';
                $deleteGate = 'qr_industry_delete';
                $crudRoutePart = 'qr-industries';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.qrIndustries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qr_industry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrIndustries.create');
    }

    public function store(StoreQrIndustryRequest $request)
    {
        $qrIndustry = QrIndustry::create($request->all());

        return redirect()->route('admin.qr-industries.index');
    }

    public function edit(QrIndustry $qrIndustry)
    {
        abort_if(Gate::denies('qr_industry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.qrIndustries.edit', compact('qrIndustry'));
    }

    public function update(UpdateQrIndustryRequest $request, QrIndustry $qrIndustry)
    {
        $qrIndustry->update($request->all());

        return redirect()->route('admin.qr-industries.index');
    }

    public function show(QrIndustry $qrIndustry)
    {
        abort_if(Gate::denies('qr_industry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrIndustry->load('industriesQrTypes');

        return view('admin.qrIndustries.show', compact('qrIndustry'));
    }

    public function destroy(QrIndustry $qrIndustry)
    {
        abort_if(Gate::denies('qr_industry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrIndustry->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrIndustryRequest $request)
    {
        QrIndustry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
