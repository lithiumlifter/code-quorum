<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Save;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DiscussionRequest;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $filters['filter'] = $request->has('filter') ? $request->input('filter') : [];
        
        $query = Discussion::with('user', 'tags', 'likes')
            ->filter($request->only(['search', 'tag']))
            ->advancedFilter($filters)
            ->orderBy('created_at', 'desc');
        
            $discussions = $query->paginate(10);
        
        $tags = Tag::all();
        
        return view('frontend.pages.discussion.index', compact('discussions', 'tags', 'filters'));
    }
    
    public function myDiscussions(Request $request)
    {
        $userId = auth()->id();
        $filters = $request->all();
        $filters['filter'] = $request->has('filter') ? $request->input('filter') : [];
    
        $query = Discussion::with('user', 'tags')
            ->where('user_id', $userId)
            ->filter($request->only(['search', 'tag']))
            ->advancedFilter($filters)
            ->orderBy('created_at', 'desc');
    
        $discussions = $query->paginate(10);
        $tags = Tag::all();
        
        return view('frontend.pages.discussion.myDiscussion.index', compact('discussions', 'tags', 'filters'));
    }
    

    public function mySaves()
    {
        $user = auth()->user();
        $savedDiscussions = Save::where('user_id', $user->id)
                                ->with('discussion.tags', 'discussion.user')
                                ->paginate(10);
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
        $answers = Answer::where('user_id', $user->id)->paginate(10);
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
    
        // Load konten HTML dari Summernote
        $dom = new \DOMDocument();
        $dom->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
        // Temukan semua elemen img dalam konten
        $images = $dom->getElementsByTagName('img');
    
        foreach ($images as $key => $img) {
            // Dapatkan data gambar dari src
            $src = $img->getAttribute('src');
            $image_data = substr($src, strpos($src, ',') + 1);
            $image_data = base64_decode($image_data);
        
            // Simpan gambar ke dalam penyimpanan Laravel
            $image_name = "public/images/" . time() . $key . '.png';
            Storage::put($image_name, $image_data);
        
            // Ganti src dengan URL penyimpanan gambar
            $img->removeAttribute('src');
            $img->setAttribute('src', Storage::url($image_name));
        }
        
        // Simpan kembali konten yang telah dimodifikasi ke dalam variabel $content
        $data['content'] = $dom->saveHTML();
        
        // Mengambil konten tanpa tag HTML untuk konten preview
        $stripContent = strip_tags($data['content']);
        $isContentLong = strlen($stripContent) > 120;
        $data['content_preview'] = $isContentLong ? (substr($stripContent, 0, 120) . '...') : $stripContent;
    
        // Buat diskusi baru dengan data yang dimodifikasi
        $discussion = Discussion::create($data);
    
        // Lampirkan tag
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

    public function update(DiscussionRequest $request, Discussion $discussion)
    {
        $data = $request->validated();
        $tagSlugs = $data['tag_slug'];
        unset($data['tag_slug']);
    
        // Update slug jika judul diperbarui
        if ($discussion->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']); // Gunakan helper Str untuk membuat slug
        }
    
        // Dapatkan konten lama dari diskusi sebelum diperbarui
        $oldContent = $discussion->content;
    
        // Load konten HTML baru dari Summernote
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // Disable errors for invalid HTML
        $dom->loadHTML($data['content'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
    
        // Temukan semua elemen img dalam konten baru
        $images = $dom->getElementsByTagName('img');
    
        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
    
            // Jika gambar masih menggunakan URL lama, jangan diproses
            if (strpos($src, 'storage') !== false) {
                continue;
            }
    
            // Proses gambar baru yang diunggah
            $image_data = substr($src, strpos($src, ',') + 1);
            $image_data = base64_decode($image_data);
    
            // Simpan gambar ke dalam penyimpanan Laravel
            $newImageName = "public/images/" . time() . $key . '.png';
            Storage::put($newImageName, $image_data);
    
            // Ganti src dengan URL penyimpanan gambar yang baru
            $img->removeAttribute('src');
            $img->setAttribute('src', Storage::url($newImageName));
        }
    
        // Simpan kembali konten yang telah dimodifikasi ke dalam variabel $content
        $data['content'] = $dom->saveHTML();
    
        // Mengambil konten tanpa tag HTML untuk konten preview
        $stripContent = strip_tags($data['content']);
        $isContentLong = strlen($stripContent) > 120;
        $data['content_preview'] = $isContentLong ? (substr($stripContent, 0, 120) . '...') : $stripContent;
    
        // Periksa apakah ada gambar yang dihapus
        $deletedImages = $this->getDeletedImages($oldContent, $data['content']);
    
        // Hapus gambar yang dihapus dari penyimpanan
        foreach ($deletedImages as $deletedImage) {
            Storage::delete('public/images/' . $deletedImage);
        }
    
        // Update discussion data
        $discussion->update($data);
    
        // Sync tags
        $discussion->tags()->sync(Tag::whereIn('slug', $tagSlugs)->pluck('id')->toArray());
    
        return redirect()->route('discussions.show', ['slug' => $discussion->slug])->with('success', 'Discussion updated successfully');
    }
    /**
     * Get the list of images that have been deleted from the content
     */
    private function getDeletedImages($oldContent, $newContent)
    {
        // Extract old images
        preg_match_all('/<img[^>]+>/i', $oldContent, $oldImages);
        $oldImageSrcs = [];
        foreach ($oldImages[0] as $img) {
            preg_match('/src="([^"]+)/i', $img, $src);
            $oldImageSrcs[] = str_replace('src="', '', $src[0]);
        }
    
        // Extract new images
        preg_match_all('/<img[^>]+>/i', $newContent, $newImages);
        $newImageSrcs = [];
        foreach ($newImages[0] as $img) {
            preg_match('/src="([^"]+)/i', $img, $src);
            $newImageSrcs[] = str_replace('src="', '', $src[0]);
        }
    
        // Determine deleted images
        $deletedImages = array_diff($oldImageSrcs, $newImageSrcs);
        $deletedImageNames = [];
        foreach ($deletedImages as $src) {
            $deletedImageNames[] = basename(parse_url($src, PHP_URL_PATH));
        }
    
        return $deletedImageNames;
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

    // Hapus gambar yang terkait dengan diskusi dari penyimpanan
    $this->deleteDiscussionImages($discussion->content);

    $delete = $discussion->delete();

    if ($delete) {
        return redirect()->route('discussions.myDiscussions')->with('success', 'Discussion deleted successfully');
    }

    return abort(500);
}

/**
 * Hapus gambar yang terkait dengan diskusi dari penyimpanan
 */
private function deleteDiscussionImages($content)
{
    // Dapatkan daftar semua gambar dari konten diskusi
    preg_match_all('/<img[^>]+>/i', $content, $images);
    $imageSrcs = [];
    foreach ($images[0] as $img) {
        preg_match('/src="([^"]+)/i', $img, $src);
        $imageSrcs[] = str_replace('src="', '', $src[0]);
    }

    // Hapus gambar dari penyimpanan
    foreach ($imageSrcs as $src) {
        Storage::delete('public/images/' . basename(parse_url($src, PHP_URL_PATH)));
    }
}

    
}
