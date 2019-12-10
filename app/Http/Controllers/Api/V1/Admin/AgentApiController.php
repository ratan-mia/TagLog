<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Http\Resources\Admin\AgentResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentResource(Agent::with(['destinations', 'industries', 'employers'])->get());
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

        if ($request->input('sliders', false)) {
            $agent->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
        }

        return (new AgentResource($agent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agent $agent)
    {
        abort_if(Gate::denies('agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentResource($agent->load(['destinations', 'industries', 'employers']));
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

        if ($request->input('sliders', false)) {
            if (!$agent->sliders || $request->input('sliders') !== $agent->sliders->file_name) {
                $agent->addMedia(storage_path('tmp/uploads/' . $request->input('sliders')))->toMediaCollection('sliders');
            }
        } elseif ($agent->sliders) {
            $agent->sliders->delete();
        }

        return (new AgentResource($agent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agent $agent)
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
