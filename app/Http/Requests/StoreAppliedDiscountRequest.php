<?php

namespace App\Http\Requests;

use App\Models\AppliedDiscount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAppliedDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('applied_discount_create');
    }

    public function rules()
    {
        return [];
    }
}
