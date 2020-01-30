<?php

namespace App\Http\Requests;

use App\Interview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInterviewRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'interview_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'start_date'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
