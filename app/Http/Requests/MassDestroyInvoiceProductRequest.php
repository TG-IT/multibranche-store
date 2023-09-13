<?php

namespace App\Http\Requests;

use App\Models\InvoiceProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInvoiceProductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('invoice_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:invoice_products,id',
        ];
    }
}
