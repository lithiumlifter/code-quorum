<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan daftar diskusi
        $discussions = Discussion::with('user')
                                ->orderBy('created_at', 'desc')->get();
        return view('frontend.pages.discussion.show', compact('discussions'));
    }

    /**
     * Show the form for creating a new answer.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created answer in storage.
     */
    public function store(Request $request, $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->firstOrFail();

        $request->validate([
            'answer' => 'required|string',
        ]);

        $answer = new Answer;
        $answer->answer = strip_tags($request->input('answer'));
        $answer->user_id = auth()->id();
        $answer->discussion_id = $discussion->id;
        $answer->save();

        return redirect()->route('discussions.show', $discussionSlug)->with('success', 'Answer added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        return view('frontend.pages.answer.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer' => 'required|string',
        ]);

        $answer->answer = strip_tags($request->input('answer'));
        $answer->save();

        return redirect()->route('discussions.show', $answer->discussion->slug)->with('success', 'Answer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $discussionSlug = $answer->discussion->slug;
        $answer->delete();

        return redirect()->route('discussions.show', $discussionSlug)->with('success', 'Answer deleted successfully.');
    }
}
