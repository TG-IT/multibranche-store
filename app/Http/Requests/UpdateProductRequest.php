<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'titel' => [
                'string',
                'required',
            ],
            'barcode' => [
                'string',
                'required',
            ],
            'sell_price' => [
                'required',
            ],
            'buy_price' => [
                'required',
            ],
            // 'quantity' => [
            //     'required',
            //     'integer',
            //     'min:-2147483648',
            //     'max:2147483647',
            // ],
            'loyal_points' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
