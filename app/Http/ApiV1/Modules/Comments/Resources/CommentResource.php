<?php

namespace App\Http\ApiV1\Modules\Comments\Resources;

use App\Domain\Comments\Models\Comments;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin Comments
 */
class CommentResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return 
        ['data' =>
            [
            'id' => $request->id,
            'user_id' => $request->user_id,
            'step_id' => $request->step_id,
            'text' => $request->text,
            'likes_number' => $request->likes_number,
            'parent_id' => $request->parent_id
            ]
        ];
    }
}