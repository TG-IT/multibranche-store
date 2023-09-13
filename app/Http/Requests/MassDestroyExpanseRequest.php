<?php

namespace App\Http\Requests;

use App\Models\Expanse;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpanseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('expanse_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expanses,id',
        ];
    }
}
