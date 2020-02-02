<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Http\Resources\Admin\InquiryResource;
use App\Inquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InquiryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InquiryResource(Inquiry::with(['user', 'agent', 'country'])->get());
    }

    public function store(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        return (new InquiryResource($inquiry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InquiryResource($inquiry->load(['user', 'agent', 'country']));
    }

    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        $inquiry->update($request->all());

        return (new InquiryResource($inquiry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
