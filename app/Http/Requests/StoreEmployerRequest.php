<?php

namespace App\Http\Requests;

use App\Employer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreEmployerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('employer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'email'              => [
                'required',
                'unique:employers',
            ],
            'recruiting_workers' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'countries.*'        => [
                'integer',
            ],
            'countries'          => [
                'array',
            ],
            'agents.*'           => [
                'integer',
            ],
            'agents'             => [
                'array',
            ],
            'industries.*'       => [
                'integer',
            ],
            'industries'         => [
                'array',
            ],
            'working_hours'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'days_off'           => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
