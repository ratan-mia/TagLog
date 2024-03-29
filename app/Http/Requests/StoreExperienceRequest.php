<?php

namespace App\Http\Requests;

use App\Experience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreExperienceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('experience_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'agent_rating'      => [
                'nullable',
                'integer',
                'min:1',
                'max:5',
            ],
            'emloyment_date'    => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'employment_period' => [
                'nullable',
                'integer',
                'min:1',
                'max:5',
            ],
            'monthly_days_off'  => [
                'nullable',
                'integer',
                'min:1',
                'max:31',
            ],
            'employer_rating'   => [
                'nullable',
                'integer',
                'min:1',
                'max:5',
            ],
        ];
    }
}
