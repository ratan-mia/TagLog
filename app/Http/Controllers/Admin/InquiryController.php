<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInquiryRequest;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;
use App\Inquiry;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InquiryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = Inquiry::all();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inquiries.create', compact('users', 'countries', 'agents'));
    }

    public function store(StoreInquiryRequest $request)
    {
        $inquiry = Inquiry::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $inquiry->id]);
        }

        return redirect()->route('admin.inquiries.index');
    }

    public function edit(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inquiry->load('user', 'country', 'agent');

        return view('admin.inquiries.edit', compact('users', 'countries', 'agents', 'inquiry'));
    }

    public function update(UpdateInquiryRequest $request, Inquiry $inquiry)
    {
        $inquiry->update($request->all());

        return redirect()->route('admin.inquiries.index');
    }

    public function show(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->load('user', 'country', 'agent');

        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function destroy(Inquiry $inquiry)
    {
        abort_if(Gate::denies('inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroyInquiryRequest $request)
    {
        Inquiry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('inquiry_create') && Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Inquiry();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
