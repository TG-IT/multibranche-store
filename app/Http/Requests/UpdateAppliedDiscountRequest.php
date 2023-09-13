<?php

namespace App\Http\Requests;

use App\Models\AppliedDiscount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppliedDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applied_discount_edit');
    }

    public function rules()
    {
        return [];
    }
}
