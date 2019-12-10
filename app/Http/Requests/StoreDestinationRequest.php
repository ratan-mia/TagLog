<?php

namespace App\Http\Requests;

use App\Destination;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDestinationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('destination_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
