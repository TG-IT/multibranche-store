<?php

namespace App\Http\Requests;

use App\Models\ProductReturn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductReturnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_return_edit');
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
