<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Http\Resources\Admin\EmployerResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('employer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployerResource(Employer::with(['countries', 'agents', 'industries'])->get());
    }

    public function store(StoreEmployerRequest $request)
    {
        $employer = Employer::create($request->all());
        $employer->countries()->sync($request->input('countries', []));
        $employer->agents()->sync($request->input('agents', []));
        $employer->industries()->sync($request->input('industries', []));

        if ($request->input('logo', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('banner_image', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
        }

        if ($request->input('gallery', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        if ($request->input('sliders', false)) {
            $employer->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
        }

        return (new EmployerResource($employer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Employer $employer)
    {
        abort_if(Gate::denies('employer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new EmployerResource($employer->load(['countries', 'agents', 'industries']));
    }

    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->update($request->all());
        $employer->countries()->sync($request->input('countries', []));
        $employer->agents()->sync($request->input('agents', []));
        $employer->industries()->sync($request->input('industries', []));

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

        if ($request->input('gallery', false)) {
            if (!$employer->gallery || $request->input('gallery') !== $employer->gallery->file_name) {
                $employer->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($employer->gallery) {
            $employer->gallery->delete();
        }

        if ($request->input('sliders', false)) {
            if (!$employer->sliders || $request->input('sliders') !== $employer->sliders->file_name) {
                $employer->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
            }
        } elseif ($employer->sliders) {
            $employer->sliders->delete();
        }

        return (new EmployerResource($employer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Employer $employer)
    {
        abort_if(Gate::denies('employer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $employer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
