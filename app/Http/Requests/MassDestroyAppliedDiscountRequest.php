<?php

namespace App\Http\Requests;

use App\Models\AppliedDiscount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAppliedDiscountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('applied_discount_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:applied_discounts,id',
        ];
    }
}
