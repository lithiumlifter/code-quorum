<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Dapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Hitung jumlah like yang diberikan oleh pengguna
        // $likesCount = Like::where('user_id', $user->id)->count();

        // Hitung jumlah simpan yang dilakukan oleh pengguna
        // $savesCount = Save::where('user_id', $user->id)->count();

        $discussions = Discussion::where('user_id', $user->id)->get();

        // Dapatkan data jawaban yang dibuat oleh pengguna
        $answers = Answer::where('user_id', $user->id)->get();

        // Dapatkan data simpan yang dilakukan oleh pengguna
        // $saves = Save::where('user_id', $user->id)->get();

        // Pass semua informasi ke view
        return view('frontend.pages.profile.index', compact('user', 'discussions' , 'answers'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'about' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->username = $request->username;
        $user->about = $request->about;
        $user->location = $request->location;

        if ($request->hasFile('picture')) {
            if ($user->picture && Storage::exists($user->picture)) {
                Storage::delete($user->picture);
            }

            $path = $request->file('picture')->store('profiles');
            $user->picture = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
