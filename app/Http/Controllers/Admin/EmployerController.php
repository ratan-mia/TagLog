<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\City;
use App\Country;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEmployerRequest;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Industry;
use App\Visa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employers = Employer::all();

        return view('admin.employers.index', compact('employers'));
    }

    public function create()
    {
        abort_if(Gate::denies('employer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id');
        $visas = Visa::all()->pluck('name', 'id');
        $agents = Agent::all()->pluck('name', 'id');
        $industries = Industry::all()->pluck('name', 'id');
        $cities = City::all()->pluck('name', 'id');

        return view('admin.employers.create', compact('cities', 'countries', 'agents', 'industries', 'visas'));
    }

    public function store(StoreEmployerRequest $request)
    {
        $employer = Employer::create($request->all());
        $employer->countries()->sync($request->input('countries', []));
        $employer->agents()->sync($request->input('agents', []));
        $employer->industries()->sync($request->input('industries', []));
        $employer->visas()->sync($request->input('visas', []));

        $employer->location()->create([
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        if ($request->input('logo', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('banner_image', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
        }

        foreach ($request->input('gallery', []) as $file) {
            $employer->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }

        foreach ($request->input('sliders', []) as $file) {
            $employer->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
        }

        return redirect()->route('admin.employers.index');
    }

    public function edit(Employer $employer)
    {
        abort_if(Gate::denies('employer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all()->pluck('name', 'id');
        $cities = City::all()->pluck('name', 'id');

        $agents = Agent::all()->pluck('name', 'id');

        $industries = Industry::all()->pluck('name', 'id');
        $visas = Visa::all()->pluck('name', 'id');
        $employer->load('countries', 'agents', 'industries', 'location');

        return view('admin.employers.edit', compact('cities', 'countries', 'agents', 'industries', 'visas', 'employer'));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->update($request->all());
        $employer->countries()->sync($request->input('countries', []));
        $employer->agents()->sync($request->input('agents', []));
        $employer->industries()->sync($request->input('industries', []));
        $employer->visas()->sync($request->input('visas', []));

        $employer->location()->update([
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
        ]);

        if ($request->input('logo', false)) {
            if (!$employer->logo || $request->input('logo') !== $employer->logo->file_name) {
                $employer->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($employer->logo) {
            $employer->logo->delete();
        }

        if ($request->input('banner_image', false)) {
            if (!$employer->banner_image || $request->input('banner_image') !== $employer->banner_image->file_name) {
                $employer->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
        } elseif ($employer->banner_image) {
            $employer->banner_image->delete();
        }

        if (count($employer->gallery) > 0) {
            foreach ($employer->gallery as $media) {
                if (!in_array($media->file_name, $request->input('gallery', []))) {
                    $media->delete();
                }
            }
        }

        $media = $employer->gallery->pluck('file_name')->toArray();

        foreach ($request->input('gallery', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $employer->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }

        if (count($employer->sliders) > 0) {
            foreach ($employer->sliders as $media) {
                if (!in_array($media->file_name, $request->input('sliders', []))) {
                    $media->delete();
                }
            }
        }

        $media = $employer->sliders->pluck('file_name')->toArray();

        foreach ($request->input('sliders', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $employer->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
            }
        }

        return redirect()->route('admin.employers.index');
    }

    public function show(Employer $employer)
    {
        abort_if(Gate::denies('employer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->load('countries', 'agents', 'industries', 'employers', 'users', 'experiences');

        return view('admin.employers.show', compact('employer'));
    }

    public function destroy(Employer $employer)
    {
        abort_if(Gate::denies('employer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->delete();

        return back();
    }

    public function massDestroy(MassDestroyEmployerRequest $request)
    {
        Employer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
