<?php

namespace App\Http\Requests;

use App\Visa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateVisaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('visa_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'duration'          => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'working_limit'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'training_duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
