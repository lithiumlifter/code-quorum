<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function discussionLike(Request $request, $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->firstOrFail();
        $discussion->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ]
        ]);
    }

    public function discussionUnLike(Request $request, $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->firstOrFail();
        $discussion->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $discussion->likeCount,
            ]
        ]);
    }

    public function answerLike(Request $request, $answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $answer->like();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $answer->likeCount,
            ]
        ]);
    }

    public function answerUnLike(Request $request, $answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $answer->unlike();

        return response()->json([
            'status' => 'success',
            'data' => [
                'likeCount' => $answer->likeCount,
            ]
        ]);
    }
}
