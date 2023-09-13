<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_create');
    }

    public function rules()
    {
        return [
            'branch_id' => [
                'required',
                'integer',
            ],
            'id_national' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'full_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'loyal_points' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
