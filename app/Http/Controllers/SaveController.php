<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    public function saveDiscussion(Request $request, $discussionId)
    {
        $user = Auth::user();

        $save = new Save();
        $save->user_id = $user->id;
        $save->discussion_id = $discussionId;
        $save->save();

        return response()->json(['message' => 'Discussion saved successfully'], 200);
    }

    public function unsaveDiscussion(Request $request, $discussionId)
    {
    $user = Auth::user();

        $save = Save::where('user_id', $user->id)->where('discussion_id', $discussionId)->first();
        if ($save) {
            $save->delete();
            return response()->json(['message' => 'Discussion unsaved successfully'], 200);
        }

        return response()->json(['message' => 'Discussion not found in saves'], 404);
    }
}
