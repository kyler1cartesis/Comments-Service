<?php

namespace App\Http\ApiV1\Modules\Comments\Controllers;

use App\Domain\Comments\Actions\ParseCommentAction;
use App\Domain\Comments\Models\Comment;
use App\Http\ApiV1\Modules\Comments\Requests\CreateCommentRequest;
use App\Http\ApiV1\Modules\Comments\Requests\DeleteCommentRequest;
use App\Http\ApiV1\Modules\Comments\Requests\GetCommentsRequest;
use App\Http\ApiV1\Modules\Comments\Requests\UpdateCommentRequest;
use App\Http\ApiV1\Modules\Comments\Resources\CommentResource;
use App\Http\ApiV1\Modules\Comments\Resources\CommentsResource;
use App\Http\ApiV1\Support\Resources\EmptyResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;

class CommentsController extends Controller
{
    public function getByStepId(GetCommentsRequest $request)
    {
        $comments = Comment::where('step_id', $request->input('step_id'))->get();
        return new CommentsResource($comments);
    }

    public function create(CreateCommentRequest $request): CommentResource
    { 
        $comment = ParseCommentAction::execute($request->all());
        $comment->saveOrFail();
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request): CommentResource
    {
        $id = $request->input('id');
        $comment = Comment::findOrFail($id);
        $comment->text = $request->input('text');
        $comment->saveOrFail();
        return new CommentResource($comment);
    }

    public function delete(DeleteCommentRequest $request): Responsable
    {
        $comment = Comment::find($request->input('id'));
        if ($comment)
            $comment->delete();
        return new EmptyResource();
    }
}
