<?php

namespace App\Http\Requests;

use App\Inquiry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateInquiryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'min:1',
                'max:255',
            ],
            'address' => [
                'min:0',
                'max:255',
            ],
        ];
    }
}
