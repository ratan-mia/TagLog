<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisaRequest;
use App\Http\Requests\UpdateVisaRequest;
use App\Http\Resources\Admin\VisaResource;
use App\Visa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visa_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisaResource(Visa::all());
    }

    public function store(StoreVisaRequest $request)
    {
        $visa = Visa::create($request->all());

        return (new VisaResource($visa))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Visa $visa)
    {
        abort_if(Gate::denies('visa_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisaResource($visa);
    }

    public function update(UpdateVisaRequest $request, Visa $visa)
    {
        $visa->update($request->all());

        return (new VisaResource($visa))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Visa $visa)
    {
        abort_if(Gate::denies('visa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visa->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
