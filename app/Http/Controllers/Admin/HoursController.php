<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHourRequest;
use App\Http\Requests\StoreHourRequest;
use App\Http\Requests\UpdateHourRequest;
use App\Models\Hour;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HoursController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('hour_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Hour::query()->select(sprintf('%s.*', (new Hour())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'hour_show';
                $editGate = 'hour_edit';
                $deleteGate = 'hour_delete';
                $crudRoutePart = 'hours';

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
            $table->editColumn('day', function ($row) {
                return $row->day ? Hour::DAY_SELECT[$row->day] : '';
            });
            $table->editColumn('open_time', function ($row) {
                return $row->open_time ? $row->open_time : '';
            });
            $table->editColumn('closing_time', function ($row) {
                return $row->closing_time ? $row->closing_time : '';
            });
            $table->editColumn('time_of_day', function ($row) {
                return $row->time_of_day ? Hour::TIME_OF_DAY_SELECT[$row->time_of_day] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.hours.index');
    }

    public function create()
    {
        abort_if(Gate::denies('hour_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hours.create');
    }

    public function store(StoreHourRequest $request)
    {
        $hour = Hour::create($request->all());

        return redirect()->route('admin.hours.index');
    }

    public function edit(Hour $hour)
    {
        abort_if(Gate::denies('hour_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hours.edit', compact('hour'));
    }

    public function update(UpdateHourRequest $request, Hour $hour)
    {
        $hour->update($request->all());

        return redirect()->route('admin.hours.index');
    }

    public function show(Hour $hour)
    {
        abort_if(Gate::denies('hour_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hours.show', compact('hour'));
    }

    public function destroy(Hour $hour)
    {
        abort_if(Gate::denies('hour_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hour->delete();

        return back();
    }

    public function massDestroy(MassDestroyHourRequest $request)
    {
        Hour::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
