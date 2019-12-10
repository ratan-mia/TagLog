<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCountryRequest;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountriesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();

        return view('admin.countries.index', compact('countries'));
    }

    public function create()
    {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        $country = Country::create($request->all());

        if ($request->input('flag', false)) {
            $country->addMedia(storage_path('tmp/uploads/' . $request->input('flag')))->toMediaCollection('flag');
        }

        foreach ($request->input('gallery', []) as $file) {
            $country->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        foreach ($request->input('additional_files', []) as $file) {
            $country->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_files');
        }

        return redirect()->route('admin.countries.index');
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->all());

        if ($request->input('flag', false)) {
            if (!$country->flag || $request->input('flag') !== $country->flag->file_name) {
                $country->addMedia(storage_path('tmp/uploads/' . $request->input('flag')))->toMediaCollection('flag');
            }
        } elseif ($country->flag) {
            $country->flag->delete();
        }

        if (count($country->gallery) > 0) {
            foreach ($country->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $country->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $country->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        if (count($country->additional_files) > 0) {
            foreach ($country->additional_files as $media) {
                if (!in_array($media->file_name, $request->input('additional_files', []))) {
                    $media->delete();
                }
            }
        }

        $media = $country->additional_files->pluck('file_name')->toArray();

        foreach ($request->input('additional_files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $country->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('additional_files');
            }
        }

        return redirect()->route('admin.countries.index');
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->load('countryUsers', 'destinationCountryUsers', 'destinationCountryExperiences', 'destinationAgents', 'countriesEmployers');

        return view('admin.countries.show', compact('country'));
    }

    public function destroy(Country $country)
    {
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return back();
    }

    public function massDestroy(MassDestroyCountryRequest $request)
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
