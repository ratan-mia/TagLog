<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Resources\Admin\SettingResource;
use App\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource(Setting::all());
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

        if ($request->input('slider', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . $request->input('slider')))->toMediaCollection('slider');
        }

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SettingResource($setting);
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

        if ($request->input('slider', false)) {
            if (!$setting->slider || $request->input('slider') !== $setting->slider->file_name) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->input('slider')))->toMediaCollection('slider');
            }
        } elseif ($setting->slider) {
            $setting->slider->delete();
        }

        return (new SettingResource($setting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
