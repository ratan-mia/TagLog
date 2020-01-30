<?php

namespace App\Http\Requests;

use App\Interview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInterviewRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('interview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:interviews,id',
        ];
    }
}
