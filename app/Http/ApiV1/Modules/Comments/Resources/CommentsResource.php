<?php

namespace App\Http\ApiV1\Modules\Comments\Resources;

use App\Domain\Comments\Models\Comment;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin Comment
 */
class CommentsResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return CommentResource::collection($this->resource) -> toArray($request);
    }
}