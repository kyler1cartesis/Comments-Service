<?php

namespace App\Http\ApiV1\Modules\Comments\Controllers;

use App\Http\ApiV1\Modules\Comments\Requests\GetCommentsRequest;
use App\Http\ApiV1\Modules\Comments\Requests\CreateCommentRequest;
use App\Http\ApiV1\Modules\Comments\Requests\DeleteCommentRequest;
use App\Http\ApiV1\Modules\Comments\Requests\UpdateCommentRequest;
use App\Http\ApiV1\Modules\Comments\Resources\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Domain\Comments\Models\Comments;

class CommentsController extends Controller
{
    public function getByStep(GetCommentsRequest $request)
    {
        $comments = Comments::where('StepId', $request->StepId)->get();
        return $comments;
    }

    public function create(CreateCommentRequest $request): CommentResource
    { 
        $comment = new Comments();
        $comment->UserId = $request->input('user_id');
        $comment->StepId = $request->input('step_id');
        $comment->Text = $request->input('text');
        $comment->ParentId = $request->input('parent_id');
        $comment->save();
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request): CommentResource
    {
        $comment = Comments::find($request->input('id'));
        if (!$comment)
            return response(null)->json(['errors' => ['Comment to update not found!']], 404);
        $comment->UserId = $request->input('user_id');
        $comment->StepId = $request->input('step_id');
        $comment->Text = $request->input('text');
        $comment->ParentId = $request->input('parent_id');
        $comment->save();
        return new CommentResource($comment);
    }

    public function delete(DeleteCommentRequest $request): CommentResource
    {
        $comment = Comments::find($request->input('id'));
        if (!$comment)
            return response(null)->json(['errors' => ['Comment to delete not found!']], 404);
        $comment->delete();
        return response()->json(['data' => 'null'], 204);
    }
}
