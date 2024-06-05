<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::with('user')
                                ->orderBy('created_at', 'desc')->get();
        return view('frontend.pages.discussion.show', compact('discussions'));
    }

    public function store(Request $request, $discussionSlug)
    {
        $discussion = Discussion::where('slug', $discussionSlug)->firstOrFail();
    
        $request->validate([
            'answer' => 'required|string',
        ]);
    
        // Load konten HTML dari Summernote
        $dom = new \DOMDocument();
        $dom->loadHTML($request->input('answer'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
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
        $answerContent = $dom->saveHTML();
    
        $answer = new Answer;
        $answer->answer = $answerContent;
        $answer->user_id = auth()->id();
        $answer->discussion_id = $discussion->id;
        $answer->save();
    
        if ($discussion->user_id != auth()->id()) {
            Notification::create([
                'user_id' => $discussion->user_id,
                'discussion_id' => $discussion->id,
                'answer_id' => $answer->id,
                'liked_by_user_id' => auth()->id(),
                'message' => 'replied to your discussion',
                'read' => false,
            ]);
        }
    
        return redirect()->route('discussions.show', $discussionSlug)->with('success', 'Answer added successfully.');
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
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Answer $answer)
{
    $request->validate([
        'answer' => 'required|string',
    ]);

    // Load konten HTML baru dari Summernote
    $dom = new \DOMDocument();
    libxml_use_internal_errors(true); // Disable errors for invalid HTML
    $dom->loadHTML($request->input('answer'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();

    // Temukan semua elemen img dalam konten baru
    $images = $dom->getElementsByTagName('img');

    // Array untuk menyimpan nama gambar yang baru diunggah
    $newImageNames = [];

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
        $newImageNames[] = $newImageName;

        // Ganti src dengan URL penyimpanan gambar yang baru
        $img->removeAttribute('src');
        $img->setAttribute('src', Storage::url($newImageName));
    }

    // Simpan kembali konten yang telah dimodifikasi ke dalam variabel $answerContent
    $answerContent = $dom->saveHTML();

    // Update answer data
    $answer->answer = $answerContent;
    $answer->save();

    return redirect()->route('discussions.show', $answer->discussion->slug)->with('success', 'Answer updated successfully.');
}


    private function deleteOldImages($answerContent)
{
    // Dapatkan daftar semua gambar dari konten lama
    preg_match_all('/<img[^>]+>/i', $answerContent, $oldImages);
    $oldImageSrcs = [];
    foreach ($oldImages[0] as $img) {
        preg_match('/src="([^"]+)/i', $img, $src);
        $oldImageSrcs[] = str_replace('src="', '', $src[0]);
    }

    // Loop melalui daftar gambar dan hapus dari penyimpanan
    foreach ($oldImageSrcs as $src) {
        $imageName = basename(parse_url($src, PHP_URL_PATH));
        Storage::delete('public/images/' . $imageName);
    }
}

public function destroy(Answer $answer)
{
    $discussionSlug = $answer->discussion->slug;
    $answer->delete();

    // Hapus gambar yang terkait dengan jawaban dari penyimpanan
    $this->deleteAnswerImages($answer->answer);

    return redirect()->route('discussions.show', $discussionSlug)->with('success', 'Answer deleted successfully.');
}

/**
 * Hapus gambar yang terkait dengan jawaban dari penyimpanan
 */
private function deleteAnswerImages($answerContent)
{
    // Dapatkan daftar semua gambar dari konten jawaban
    preg_match_all('/<img[^>]+>/i', $answerContent, $images);
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
