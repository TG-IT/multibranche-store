<?php

namespace App\Http\Requests;

use App\Models\ProductReturn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductReturnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_return_create');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
