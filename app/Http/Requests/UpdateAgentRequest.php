<?php

namespace App\Http\Requests;

use App\Agent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateAgentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'email'          => [
                'required',
                'unique:agents,email,' . request()->route('agent')->id,
            ],
            'destinations.*' => [
                'integer',
            ],
            'destinations'   => [
                'array',
            ],
            'industries.*'   => [
                'integer',
            ],
            'industries'     => [
                'array',
            ],
            'employers.*'    => [
                'integer',
            ],
            'employers'      => [
                'array',
            ],
            'workers_sent'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
