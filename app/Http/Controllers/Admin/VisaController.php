<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVisaRequest;
use App\Http\Requests\StoreVisaRequest;
use App\Http\Requests\UpdateVisaRequest;
use App\Visa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VisaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Visa::query()->select(sprintf('%s.*', (new Visa)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'visa_show';
                $editGate      = 'visa_edit';
                $deleteGate    = 'visa_delete';
                $crudRoutePart = 'visas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? $row->type : "";
            });
            $table->editColumn('countries_without_visa', function ($row) {
                return $row->countries_without_visa ? Visa::COUNTRIES_WITHOUT_VISA_SELECT[$row->countries_without_visa] : '';
            });
            $table->editColumn('duration', function ($row) {
                return $row->duration ? $row->duration : "";
            });
            $table->editColumn('work_permit', function ($row) {
                return $row->work_permit ? Visa::WORK_PERMIT_RADIO[$row->work_permit] : '';
            });
            $table->editColumn('working_limit', function ($row) {
                return $row->working_limit ? $row->working_limit : "";
            });
            $table->editColumn('industries', function ($row) {
                return $row->industries ? Visa::INDUSTRIES_SELECT[$row->industries] : '';
            });
            $table->editColumn('language_traning', function ($row) {
                return $row->language_traning ? Visa::LANGUAGE_TRANING_RADIO[$row->language_traning] : '';
            });
            $table->editColumn('training_duration', function ($row) {
                return $row->training_duration ? $row->training_duration : "";
            });
            $table->editColumn('countries_restrictred', function ($row) {
                return $row->countries_restrictred ? Visa::COUNTRIES_RESTRICTRED_SELECT[$row->countries_restrictred] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.visas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('visa_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visas.create');
    }

    public function store(StoreVisaRequest $request)
    {
        $visa = Visa::create($request->all());

        return redirect()->route('admin.visas.index');
    }

    public function edit(Visa $visa)
    {
        abort_if(Gate::denies('visa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visas.edit', compact('visa'));
    }

    public function update(UpdateVisaRequest $request, Visa $visa)
    {
        $visa->update($request->all());

        return redirect()->route('admin.visas.index');
    }

    public function show(Visa $visa)
    {
        abort_if(Gate::denies('visa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visas.show', compact('visa'));
    }

    public function destroy(Visa $visa)
    {
        abort_if(Gate::denies('visa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visa->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisaRequest $request)
    {
        Visa::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
