<?php

namespace App\Http\ApiV1\Modules\Comments\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class GetCommentsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            // 'step_id' => ['required', 'integer'],
        ];
    }
}
