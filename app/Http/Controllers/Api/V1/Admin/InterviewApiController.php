<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Http\Resources\Admin\InterviewResource;
use App\Interview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InterviewApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('interview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InterviewResource(Interview::with(['user'])->get());
    }

    public function store(StoreInterviewRequest $request)
    {
        $interview = Interview::create($request->all());

        return (new InterviewResource($interview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Interview $interview)
    {
        abort_if(Gate::denies('interview_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InterviewResource($interview->load(['user']));
    }

    public function update(UpdateInterviewRequest $request, Interview $interview)
    {
        $interview->update($request->all());

        return (new InterviewResource($interview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Interview $interview)
    {
        abort_if(Gate::denies('interview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
