<?php

namespace App\Http\ApiV1\Modules\Comments\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

class CommentResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'step_id' => $this->step_id,
            'parent_id' => $this->parent_id,
            'text' => $this->text,
            'likes_number' => $this->likes_number,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}