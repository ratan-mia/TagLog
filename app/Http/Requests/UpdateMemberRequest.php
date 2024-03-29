<?php

namespace App\Http\Requests;

use App\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMemberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name' => [
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
