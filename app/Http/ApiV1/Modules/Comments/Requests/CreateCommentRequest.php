<?php

namespace App\Http\ApiV1\Modules\Comments\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateCommentRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'step_id' => ['required', 'integer'],
            'text' => ['required', 'string'],
            'parent_id' => ['nullable', 'integer'],
        ];
    }
}
