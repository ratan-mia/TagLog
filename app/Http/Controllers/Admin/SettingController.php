<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Setting::query()->select(sprintf('%s.*', (new Setting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'setting_show';
                $editGate      = 'setting_edit';
                $deleteGate    = 'setting_delete';
                $crudRoutePart = 'settings';

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
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('url', function ($row) {
                return $row->url ? $row->url : "";
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('philosophy_title', function ($row) {
                return $row->philosophy_title ? $row->philosophy_title : "";
            });
            $table->editColumn('philosophy_image', function ($row) {
                if ($photo = $row->philosophy_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('business_title', function ($row) {
                return $row->business_title ? $row->business_title : "";
            });
            $table->editColumn('business_sentence', function ($row) {
                return $row->business_sentence ? $row->business_sentence : "";
            });
            $table->editColumn('business_image', function ($row) {
                if ($photo = $row->business_image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('slider', function ($row) {
                if (!$row->slider) {
                    return '';
                }

                $links = [];

                foreach ($row->slider as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'philosophy_image', 'business_image', 'slider']);

            return $table->make(true);
        }

        return view('admin.settings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('logo', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('philosophy_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('philosophy_image')))->toMediaCollection('philosophy_image');
        }

        if ($request->input('business_image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('business_image')))->toMediaCollection('business_image');
        }

        foreach ($request->input('slider', []) as $file) {
            $setting->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('slider');
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('logo', false)) {
            if (!$setting->logo || $request->input('logo') !== $setting->logo->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($setting->logo) {
            $setting->logo->delete();
        }

        if ($request->input('philosophy_image', false)) {
            if (!$setting->philosophy_image || $request->input('philosophy_image') !== $setting->philosophy_image->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('philosophy_image')))->toMediaCollection('philosophy_image');
            }
        } elseif ($setting->philosophy_image) {
            $setting->philosophy_image->delete();
        }

        if ($request->input('business_image', false)) {
            if (!$setting->business_image || $request->input('business_image') !== $setting->business_image->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('business_image')))->toMediaCollection('business_image');
            }
        } elseif ($setting->business_image) {
            $setting->business_image->delete();
        }

        if (count($setting->slider) > 0) {
            foreach ($setting->slider as $media) {
                if (!in_array($media->file_name, $request->input('slider', []))) {
                    $media->delete();
                }
            }
        }

        $media = $setting->slider->pluck('file_name')->toArray();

        foreach ($request->input('slider', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $setting->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('slider');
            }
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
