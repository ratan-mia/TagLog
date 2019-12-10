<?php

namespace App\Http\Controllers\Admin;

use App\Destination;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDestinationRequest;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DestinationController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Destination::query()->select(sprintf('%s.*', (new Destination)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'destination_show';
                $editGate      = 'destination_edit';
                $deleteGate    = 'destination_delete';
                $crudRoutePart = 'destinations';

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
            $table->editColumn('language', function ($row) {
                return $row->language ? Destination::LANGUAGE_SELECT[$row->language] : '';
            });
            $table->editColumn('currency', function ($row) {
                return $row->currency ? $row->currency : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('flag', function ($row) {
                if ($photo = $row->flag) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('gallery', function ($row) {
                if (!$row->gallery) {
                    return '';
                }

                $links = [];

                foreach ($row->gallery as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('industries', function ($row) {
                return $row->industries ? Destination::INDUSTRIES_SELECT[$row->industries] : '';
            });
            $table->editColumn('employers', function ($row) {
                return $row->employers ? $row->employers : "";
            });
            $table->editColumn('agents', function ($row) {
                return $row->agents ? Destination::AGENTS_SELECT[$row->agents] : '';
            });
            $table->editColumn('hourly_salary', function ($row) {
                return $row->hourly_salary ? $row->hourly_salary : "";
            });
            $table->editColumn('monthly_salary', function ($row) {
                return $row->monthly_salary ? $row->monthly_salary : "";
            });
            $table->editColumn('yearly_salary', function ($row) {
                return $row->yearly_salary ? $row->yearly_salary : "";
            });
            $table->editColumn('safe_medicine', function ($row) {
                return $row->safe_medicine ? Destination::SAFE_MEDICINE_RADIO[$row->safe_medicine] : '';
            });
            $table->editColumn('healthcare', function ($row) {
                return $row->healthcare ? $row->healthcare : "";
            });
            $table->editColumn('taxi_available', function ($row) {
                return $row->taxi_available ? Destination::TAXI_AVAILABLE_RADIO[$row->taxi_available] : '';
            });
            $table->editColumn('safety', function ($row) {
                return $row->safety ? $row->safety : "";
            });
            $table->editColumn('politics', function ($row) {
                return $row->politics ? $row->politics : "";
            });
            $table->editColumn('insurance', function ($row) {
                return $row->insurance ? $row->insurance : "";
            });
            $table->editColumn('documents', function ($row) {
                return $row->documents ? '<a href="' . $row->documents->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'flag', 'gallery', 'documents']);

            return $table->make(true);
        }

        return view('admin.destinations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('destination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.create');
    }

    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->all());

        if ($request->input('flag', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . $request->input('flag')))->toMediaCollection('flag');
        }

        foreach ($request->input('gallery', []) as $file) {
            $destination->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        if ($request->input('documents', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
        }

        return redirect()->route('admin.destinations.index');
    }

    public function edit(Destination $destination)
    {
        abort_if(Gate::denies('destination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->all());

        if ($request->input('flag', false)) {
            if (!$destination->flag || $request->input('flag') !== $destination->flag->file_name) {
                $destination->addMedia(storage_path('tmp/uploads/' . $request->input('flag')))->toMediaCollection('flag');
            }
        } elseif ($destination->flag) {
            $destination->flag->delete();
        }

        if (count($destination->gallery) > 0) {
            foreach ($destination->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $destination->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $destination->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        if ($request->input('documents', false)) {
            if (!$destination->documents || $request->input('documents') !== $destination->documents->file_name) {
                $destination->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
            }
        } elseif ($destination->documents) {
            $destination->documents->delete();
        }

        return redirect()->route('admin.destinations.index');
    }

    public function show(Destination $destination)
    {
        abort_if(Gate::denies('destination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.destinations.show', compact('destination'));
    }

    public function destroy(Destination $destination)
    {
        abort_if(Gate::denies('destination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destination->delete();

        return back();
    }

    public function massDestroy(MassDestroyDestinationRequest $request)
    {
        Destination::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
