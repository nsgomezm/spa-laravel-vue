<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class BaseCommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->validated());
        return new CommentResource($comment);
    }

    public function update(Comment $comment,  CommentStoreRequest $request)
    {
        $comment->update($request->validated());
        return new CommentResource($comment);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'isConfirmed' => true,
        ]);
    }
}
