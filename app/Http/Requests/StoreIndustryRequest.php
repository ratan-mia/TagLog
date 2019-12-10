<?php

namespace App\Http\Requests;

use App\Industry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIndustryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('industry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
        ];
    }
}
