<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBranchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('branch_edit');
    }

    public function rules()
    {
        return [
            'branch_id' => [
                'integer',
                'required',
            ],
            'branch_name' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            
            
        ];
    }
}

