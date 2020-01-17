<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Country;
use App\Employer;
use App\Experience;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExperienceRequest;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\UpdateExperienceRequest;
use App\Industry;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExperienceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('experience_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiences = Experience::all();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        abort_if(Gate::denies('experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.experiences.create', compact('users', 'agents', 'destinations', 'employers', 'industries'));
    }

    public function store(StoreExperienceRequest $request)
    {
        $experience = Experience::create($request->all());

        return redirect()->route('admin.experiences.index');
    }

    public function edit(Experience $experience)
    {
        abort_if(Gate::denies('experience_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Agent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destinations = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $industries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $experience->load('user', 'agent', 'destination', 'employer', 'industry');

        return view('admin.experiences.edit', compact('users', 'agents', 'destinations', 'employers', 'industries', 'experience'));
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->all());

//        return redirect()->route('admin.experiences.index');

        return redirect()->back()->with('message', 'The information has been updated successfully!');
    }

    public function show(Experience $experience)
    {
        abort_if(Gate::denies('experience_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experience->load('user', 'agent', 'destination', 'employer', 'industry');

        return view('admin.experiences.show', compact('experience'));
    }

    public function destroy(Experience $experience)
    {
        abort_if(Gate::denies('experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experience->delete();

        return back();
    }

    public function massDestroy(MassDestroyExperienceRequest $request)
    {
        Experience::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
