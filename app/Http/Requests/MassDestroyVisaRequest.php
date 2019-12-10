<?php

namespace App\Http\Requests;

use App\Visa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVisaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('visa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:visas,id',
        ];
    }
}
