<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Employer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Industry;
use App\Nationality;
use App\Role;
use App\User;
use App\Visa;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destination_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expected_industries = Industry::all()->pluck('name', 'id');

        $visas                = Visa::all()->pluck('name', 'id');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $indurstries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('roles', 'countries', 'destination_countries', 'expected_industries','visas', 'employers', 'agents', 'indurstries'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->expected_industries()->sync($request->input('expected_industries', []));

        if ($request->input('profile_picture', false)) {
            $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_picture')))->toMediaCollection('profile_picture');
        }

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        $countries     = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $nationalities = Nationality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $destination_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expected_industries = Industry::all()->pluck('name', 'id');

        $visas                = Visa::all()->pluck('name', 'id');

        $employers = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $agents = Employer::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $indurstries = Industry::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'country', 'nationality','destination_country', 'expected_industries','visa', 'employer', 'agents', 'indurstry');

        return view('admin.users.edit', compact('roles', 'countries', 'nationalities','destination_countries', 'expected_industries','visas', 'employers', 'agents', 'indurstries', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->expected_industries()->sync($request->input('expected_industries', []));

        if ($request->input('profile_picture', false)) {
            if (!$user->profile_picture || $request->input('profile_picture') !== $user->profile_picture->file_name) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('profile_picture')))->toMediaCollection('profile_picture');
            }
        } elseif ($user->profile_picture) {
            $user->profile_picture->delete();
        }

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'country', 'nationality','destination_country', 'expected_industries', 'employer', 'agents', 'indurstry', 'userExperiences', 'employersAgents');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
