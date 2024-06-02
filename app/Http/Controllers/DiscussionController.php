<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Save;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DiscussionRequest;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::with('user', 'tags')
                                ->orderBy('created_at', 'desc')->get();
        $tags = Tag::all();
        return view('frontend.pages.discussion.index', compact('discussions', 'tags'));
    }

    public function myDiscussions()
    {
        $userId = auth()->id();
        $discussions = Discussion::with('user', 'tags')
                                ->where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $tags = Tag::all();
        return view('frontend.pages.discussion.myDiscussion.index', compact('discussions', 'tags'));
    }

    public function mySaves()
    {
        $user = auth()->user();
        $savedDiscussions = Save::where('user_id', $user->id)
                                ->with('discussion.tags', 'discussion.user')
                                ->get();
        $tags = Tag::all();
        return view('frontend.pages.save.mySave.index', compact('savedDiscussions', 'tags'));
    }

    public function tag()
    {
        $tags = Tag::all();
        return view('frontend.pages.tag.index', compact('tags'));
    }

    public function showTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $discussions = $tag->discussions()->latest()->paginate(10);
        return view('frontend.pages.tag.show', compact('tag', 'discussions'));
    }

    public function myAnswer(){
        $user = Auth::user();
        $answers = Answer::where('user_id', $user->id)->get();
        $tags = Tag::all();

        return view('frontend.pages.answer.myAnswer.index', compact('answers', 'tags'));
    }

    public function create(){
        $tags = Tag::all();

        return view('frontend.pages.discussion.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscussionRequest $request)
    {
        $data = $request->validated();
        $tagSlugs = $data['tag_slug'];
        unset($data['tag_slug']);
    
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']) . '-' . time();
    
        $stripContent = strip_tags($data['content']);
        $isContentLong = strlen($stripContent) > 120;
        $data['content_preview'] = $isContentLong ? (substr($stripContent, 0, 120) . '...') : $stripContent;
    
        $discussion = Discussion::create($data);
    
        $discussion->tags()->attach(Tag::whereIn('slug', $tagSlugs)->pluck('id')->toArray());
    
        return redirect()->route('discussions.myDiscussions')->with('success', 'Successfully created a new discussion');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $discussions = Discussion::with(['user', 'tags'])->where('slug', $slug)->firstOrFail();
        $discussions->increment('view_count');
        return view('frontend.pages.discussion.show', compact('discussions'));
    }
    
    public function edit($slug){
        $discussions = Discussion::with(['user', 'tags'])->where('slug', $slug)->firstOrFail();
        $tags = Tag::all();
        return view('frontend.pages.discussion.edit', compact('discussions', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscussionRequest $request, Discussion $discussion){
        $data = $request->validated();
        $tagSlugs = $data['tag_slug'];
        unset($data['tag_slug']);
    
        // Update discussion data
        $discussion->update($data);
    
        // Update content preview
        $stripContent = strip_tags($discussion->content);
        $isContentLong = strlen($stripContent) > 120;
        $discussion->content_preview = $isContentLong ? (substr($stripContent, 0, 120) . '...') : $stripContent;
        $discussion->save();
    
        // Sync tags
        $discussion->tags()->sync(Tag::whereIn('slug', $tagSlugs)->pluck('id')->toArray());
    
        return redirect()->route('discussions.myDiscussions')->with('success', 'Discussion updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $discussion = Discussion::with('tags')->where('slug', $slug)->first();
    
        if (!$discussion) {
            return abort(404);
        }
    
        // Memeriksa apakah pengguna yang masuk memiliki diskusi yang ingin dihapus
        $isOwnedByUser = $discussion->user_id == auth()->id();
    
        if (!$isOwnedByUser) {
            return abort(403); // Unauthorized
        }
    
        $delete = $discussion->delete();
    
        if ($delete) {
            return redirect()->route('discussions.myDiscussions')->with('success', 'Discussion deleted successfully');
        }
    
        return abort(500);
    }
    
}
