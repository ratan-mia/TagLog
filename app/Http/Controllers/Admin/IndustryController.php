<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyIndustryRequest;
use App\Http\Requests\StoreIndustryRequest;
use App\Http\Requests\UpdateIndustryRequest;
use App\Industry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndustryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('industry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $all_industries = Industry::all();

        return view('admin.industries.index', compact('all_industries'));
    }

    public function create()
    {
        abort_if(Gate::denies('industry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.industries.create');
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

        foreach ($request->input('gallery', []) as $file) {
            $industry->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        foreach ($request->input('sliders', []) as $file) {
            $industry->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
        }

        return redirect()->route('admin.industries.index');
    }

    public function edit(Industry $industry)
    {
        abort_if(Gate::denies('industry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.industries.edit', compact('industry'));
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

        if (count($industry->gallery) > 0) {
            foreach ($industry->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $industry->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $industry->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        if (count($industry->sliders) > 0) {
            foreach ($industry->sliders as $media) {
                if (!in_array($media->file_name, $request->input('sliders', []))) {
                    $media->delete();
                }
            }
        }

        $media = $industry->sliders->pluck('file_name')->toArray();

        foreach ($request->input('sliders', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $industry->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
            }
        }

        return redirect()->route('admin.industries.index');
    }

    public function show(Industry $industry)
    {
        abort_if(Gate::denies('industry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $industry->load('indurstryUsers', 'industryExperiences', 'industryAgents', 'industriesEmployers', 'expectedIndustriesUsers');

        return view('admin.industries.show', compact('industry'));
    }

    public function destroy(Industry $industry)
    {
        abort_if(Gate::denies('industry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $industry->delete();

        return back();
    }

    public function massDestroy(MassDestroyIndustryRequest $request)
    {
        Industry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
