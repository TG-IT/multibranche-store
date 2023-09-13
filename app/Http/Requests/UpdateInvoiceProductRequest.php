<?php

namespace App\Http\Requests;

use App\Models\InvoiceProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoiceProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_product_edit');
    }

    public function rules()
    {
        return [
            'id_invoice' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'id_product' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'qtt' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'id_appleid_discount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
