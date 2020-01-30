<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInterviewRequest;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Interview;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InterviewController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('interview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interviews = Interview::all();

        return view('admin.interviews.index', compact('interviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('interview_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.interviews.create', compact('users'));
    }

    public function store(StoreInterviewRequest $request)
    {
        $interview = Interview::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $interview->id]);
        }

        return redirect()->route('admin.interviews.index');
    }

    public function edit(Interview $interview)
    {
        abort_if(Gate::denies('interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $interview->load('user');

        return view('admin.interviews.edit', compact('users', 'interview'));
    }

    public function update(UpdateInterviewRequest $request, Interview $interview)
    {
        $interview->update($request->all());

        return redirect()->route('admin.interviews.index');
    }

    public function show(Interview $interview)
    {
        abort_if(Gate::denies('interview_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->load('user');

        return view('admin.interviews.show', compact('interview'));
    }

    public function destroy(Interview $interview)
    {
        abort_if(Gate::denies('interview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->delete();

        return back();
    }

    public function massDestroy(MassDestroyInterviewRequest $request)
    {
        Interview::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('interview_create') && Gate::denies('interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Interview();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
