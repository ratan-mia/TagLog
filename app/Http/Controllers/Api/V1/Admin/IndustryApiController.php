<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Http\Resources\Admin\IndustryResource;
use App\Industry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndustryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('industry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndustryResource(Industry::all());
    }

    public function store(StoreIndustryRequest $request)
    {
        $industry = Industry::create($request->all());

        if ($request->input('icon', false)) {
            $industry->addMedia(storage_path('tmp/uploads/' . $request->input('icon')))->toMediaCollection('icon');
        }

        if ($request->input('logo', false)) {
            $industry->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('banner_image', false)) {
            $industry->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
        }

        if ($request->input('gallery', false)) {
            $industry->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        if ($request->input('sliders', false)) {
            $industry->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
        }

        return (new IndustryResource($industry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Industry $industry)
    {
        abort_if(Gate::denies('industry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IndustryResource($industry);
    }

    public function update(UpdateIndustryRequest $request, Industry $industry)
    {
        $industry->update($request->all());

        if ($request->input('icon', false)) {
            if (!$industry->icon || $request->input('icon') !== $industry->icon->file_name) {
                $industry->addMedia(storage_path('tmp/uploads/' . $request->input('icon')))->toMediaCollection('icon');
            }
        } elseif ($industry->icon) {
            $industry->icon->delete();
        }

        if ($request->input('logo', false)) {
            if (!$industry->logo || $request->input('logo') !== $industry->logo->file_name) {
                $industry->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($industry->logo) {
            $industry->logo->delete();
        }

        if ($request->input('banner_image', false)) {
            if (!$industry->banner_image || $request->input('banner_image') !== $industry->banner_image->file_name) {
                $industry->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
        } elseif ($industry->banner_image) {
            $industry->banner_image->delete();
        }

        if ($request->input('gallery', false)) {
            if (!$industry->gallery || $request->input('gallery') !== $industry->gallery->file_name) {
                $industry->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($industry->gallery) {
            $industry->gallery->delete();
        }

        if ($request->input('sliders', false)) {
            if (!$industry->sliders || $request->input('sliders') !== $industry->sliders->file_name) {
                $industry->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
            }
        } elseif ($industry->sliders) {
            $industry->sliders->delete();
        }

        return (new IndustryResource($industry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Industry $industry)
    {
        abort_if(Gate::denies('industry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $industry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
