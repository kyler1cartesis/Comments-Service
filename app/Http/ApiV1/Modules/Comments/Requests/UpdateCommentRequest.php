<?php

namespace App\Http\ApiV1\Modules\Comments\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class UpdateCommentRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer'],
            'text' => ['required', 'string'],
        ];
    }
}
