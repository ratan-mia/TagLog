<?php

namespace App\Http\Requests;

use App\Destination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDestinationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('destination_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
