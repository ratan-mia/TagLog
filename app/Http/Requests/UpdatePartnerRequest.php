<?php

namespace App\Http\Requests;

use App\Partner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePartnerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'country' => [
                'required',
            ],
            'company' => [
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
