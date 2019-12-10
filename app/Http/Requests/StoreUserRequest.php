<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                  => [
                'required',
            ],
            'email'                 => [
                'required',
                'unique:users',
            ],
            'password'              => [
                'required',
            ],
            'roles.*'               => [
                'integer',
            ],
            'roles'                 => [
                'required',
                'array',
            ],
            'date_of_birth'         => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'expected_industries.*' => [
                'integer',
            ],
            'expected_industries'   => [
                'array',
            ],
            'date_of_leaving'       => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
