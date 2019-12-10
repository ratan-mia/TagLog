<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgentRequest;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Industry;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::all();

        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        abort_if(Gate::denies('agent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destinations = Country::all()->pluck('name', 'id');

        $industries = Industry::all()->pluck('name', 'id');

        $employers = User::all()->pluck('name', 'id');

        return view('admin.agents.create', compact('destinations', 'industries', 'employers'));
    }

    public function store(StoreAgentRequest $request)
    {
        $agent = Agent::create($request->all());
        $agent->destinations()->sync($request->input('destinations', []));
        $agent->industries()->sync($request->input('industries', []));
        $agent->employers()->sync($request->input('employers', []));

        if ($request->input('logo', false)) {
            $agent->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        if ($request->input('banner_image', false)) {
            $agent->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
        }

        foreach ($request->input('sliders', []) as $file) {
            $agent->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
        }

        return redirect()->route('admin.agents.index');
    }

    public function edit(Agent $agent)
    {
        abort_if(Gate::denies('agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $destinations = Country::all()->pluck('name', 'id');

        $industries = Industry::all()->pluck('name', 'id');

        $employers = User::all()->pluck('name', 'id');

        $agent->load('destinations', 'industries', 'employers');

        return view('admin.agents.edit', compact('destinations', 'industries', 'employers', 'agent'));
    }

    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $agent->update($request->all());
        $agent->destinations()->sync($request->input('destinations', []));
        $agent->industries()->sync($request->input('industries', []));
        $agent->employers()->sync($request->input('employers', []));

        if ($request->input('logo', false)) {
            if (!$agent->logo || $request->input('logo') !== $agent->logo->file_name) {
                $agent->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($agent->logo) {
            $agent->logo->delete();
        }

        if ($request->input('banner_image', false)) {
            if (!$agent->banner_image || $request->input('banner_image') !== $agent->banner_image->file_name) {
                $agent->addMedia(storage_path('tmp/uploads/' . $request->input('banner_image')))->toMediaCollection('banner_image');
            }
        } elseif ($agent->banner_image) {
            $agent->banner_image->delete();
        }

        if (count($agent->sliders) > 0) {
            foreach ($agent->sliders as $media) {
                if (!in_array($media->file_name, $request->input('sliders', []))) {
                    $media->delete();
                }
            }
        }

        $media = $agent->sliders->pluck('file_name')->toArray();

        foreach ($request->input('sliders', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $agent->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('sliders');
            }
        }

        return redirect()->route('admin.agents.index');
    }

    public function show(Agent $agent)
    {
        abort_if(Gate::denies('agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->load('destinations', 'industries', 'employers', 'agentExperiences', 'agentsEmployers');

        return view('admin.agents.show', compact('agent'));
    }

    public function destroy(Agent $agent)
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentRequest $request)
    {
        Agent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
