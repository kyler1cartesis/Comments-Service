<?php

namespace App\Http\ApiV1\Modules\Comments\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateCommentRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'uuid'],
            'step_id' => ['required', 'uuid'],
            'text' => ['required', 'string'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }
}
