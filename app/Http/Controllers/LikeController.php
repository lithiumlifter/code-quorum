<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use App\Models\Notification;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function discussionLike(Request $request, $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->firstOrFail();
        $discussion->like();
        
        if ($discussion->user_id !== auth()->id()) {
            Notification::create([
                'user_id' => $discussion->user_id,
                'discussion_id' => $discussion->id,
                'liked_by_user_id' => auth()->id(),
                'message' => 'liked your discussion.',
            ]);
        }

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
    
        if ($answer->user_id !== auth()->id()) {
            Notification::create([
                'user_id' => $answer->user_id,
                'answer_id' => $answer->id,
                'liked_by_user_id' => auth()->id(),
                'message' => 'liked your answer.',
            ]);
        }
    
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
