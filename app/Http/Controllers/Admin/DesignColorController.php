<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDesignColorRequest;
use App\Http\Requests\StoreDesignColorRequest;
use App\Http\Requests\UpdateDesignColorRequest;
use App\Models\DesignColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DesignColorController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('design_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DesignColor::query()->select(sprintf('%s.*', (new DesignColor())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'design_color_show';
                $editGate = 'design_color_edit';
                $deleteGate = 'design_color_delete';
                $crudRoutePart = 'design-colors';

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
            $table->editColumn('primary', function ($row) {
                return $row->primary ? $row->primary : '';
            });
            $table->editColumn('button', function ($row) {
                return $row->button ? $row->button : '';
            });
            $table->editColumn('secondary', function ($row) {
                return $row->secondary ? $row->secondary : '';
            });
            $table->editColumn('gradient', function ($row) {
                return $row->gradient ? $row->gradient : '';
            });
            $table->editColumn('custom_color', function ($row) {
                return $row->custom_color ? $row->custom_color : '';
            });
            $table->editColumn('custom_button', function ($row) {
                return $row->custom_button ? $row->custom_button : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.designColors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('design_color_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.designColors.create');
    }

    public function store(StoreDesignColorRequest $request)
    {
        $designColor = DesignColor::create($request->all());

        return redirect()->route('admin.design-colors.index');
    }

    public function edit(DesignColor $designColor)
    {
        abort_if(Gate::denies('design_color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.designColors.edit', compact('designColor'));
    }

    public function update(UpdateDesignColorRequest $request, DesignColor $designColor)
    {
        $designColor->update($request->all());

        return redirect()->route('admin.design-colors.index');
    }

    public function show(DesignColor $designColor)
    {
        abort_if(Gate::denies('design_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.designColors.show', compact('designColor'));
    }

    public function destroy(DesignColor $designColor)
    {
        abort_if(Gate::denies('design_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designColor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDesignColorRequest $request)
    {
        DesignColor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
