<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Destination;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Http\Resources\Admin\DestinationResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DestinationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('destination_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DestinationResource(Destination::all());
    }

    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->all());

        if ($request->input('flag', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . $request->input('flag')))->toMediaCollection('flag');
        }

        if ($request->input('gallery', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
        }

        if ($request->input('documents', false)) {
            $destination->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
        }

        return (new DestinationResource($destination))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Destination $destination)
    {
        abort_if(Gate::denies('destination_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DestinationResource($destination);
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

        if ($request->input('gallery', false)) {
            if (!$destination->gallery || $request->input('gallery') !== $destination->gallery->file_name) {
                $destination->addMedia(storage_path('tmp/uploads/' . $request->input('gallery')))->toMediaCollection('gallery');
            }
        } elseif ($destination->gallery) {
            $destination->gallery->delete();
        }

        if ($request->input('documents', false)) {
            if (!$destination->documents || $request->input('documents') !== $destination->documents->file_name) {
                $destination->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
            }
        } elseif ($destination->documents) {
            $destination->documents->delete();
        }

        return (new DestinationResource($destination))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Destination $destination)
    {
        abort_if(Gate::denies('destination_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destination->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
