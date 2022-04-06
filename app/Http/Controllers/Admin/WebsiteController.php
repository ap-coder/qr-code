<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWebsiteRequest;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\User;
use App\Models\Website;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class WebsiteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('website_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Website::with(['created_by'])->select(sprintf('%s.*', (new Website())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'website_show';
                $editGate = 'website_edit';
                $deleteGate = 'website_delete';
                $crudRoutePart = 'websites';

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
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->editColumn('qr_name', function ($row) {
                return $row->qr_name ? $row->qr_name : '';
            });
            $table->editColumn('website_name', function ($row) {
                return $row->website_name ? $row->website_name : '';
            });
            $table->editColumn('url', function ($row) {
                return $row->url ? $row->url : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by']);

            return $table->make(true);
        }

        return view('admin.websites.index');
    }

    public function create()
    {
        abort_if(Gate::denies('website_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.websites.create', compact('created_bies'));
    }

    public function store(StoreWebsiteRequest $request)
    {
        $website = Website::create($request->all());

        return redirect()->route('admin.websites.index');
    }

    public function edit(Website $website)
    {
        abort_if(Gate::denies('website_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $website->load('created_by');

        return view('admin.websites.edit', compact('created_bies', 'website'));
    }

    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->all());

        return redirect()->route('admin.websites.index');
    }

    public function show(Website $website)
    {
        abort_if(Gate::denies('website_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $website->load('created_by', 'websitesQrCodes');

        return view('admin.websites.show', compact('website'));
    }

    public function destroy(Website $website)
    {
        abort_if(Gate::denies('website_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $website->delete();

        return back();
    }

    public function massDestroy(MassDestroyWebsiteRequest $request)
    {
        Website::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
