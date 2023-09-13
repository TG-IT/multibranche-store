<?php

namespace App\Http\Requests;

use App\Models\Discount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDiscountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('discount_edit');
    }

    public function rules()
    {
        return [
            'percentage' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
