<?php

namespace App\Http\Requests;

use App\Models\SyncLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySyncLogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sync_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sync_logs,id',
        ];
    }
}
