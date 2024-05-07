<?php

namespace App\Domain\Comments\Actions;

use App\Domain\Comments\Models\Comment;

class ParseCommentAction
{
    public static function execute(array $data): Comment
    {
        $comment = new Comment();
        // $comment->id = $data['id'];
        $comment->user_id = $data['user_id'];
        $comment->step_id = $data['step_id'];
        $comment->text = $data['text'];
        $comment->parent_id = $data['parent_id'];
        // $comment->save();
        return $comment;
    }
}
