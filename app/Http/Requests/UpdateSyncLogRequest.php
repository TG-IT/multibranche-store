<?php

namespace App\Http\Requests;

use App\Models\SyncLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSyncLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sync_log_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
