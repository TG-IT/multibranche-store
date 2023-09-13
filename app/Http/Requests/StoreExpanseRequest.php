<?php

namespace App\Http\Requests;

use App\Models\Expanse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExpanseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expanse_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'expensecategory_id' => [
                'required',
                'integer',
            ],
            'price' => [
                'required',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
