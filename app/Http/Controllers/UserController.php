<?php

namespace App\Http\Controllers;

use App\Models\Save;
use App\Models\User;
use App\Models\Answer;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $discussions = Discussion::where('user_id', $user->id)->paginate(10);

        $answers = Answer::where('user_id', $user->id)->paginate(10);

        $savedDiscussions = Save::where('user_id', $user->id)->with('discussion')->paginate(10);

        return view('frontend.pages.profile.index', compact('user', 'discussions' , 'answers', 'savedDiscussions'));
    }

    public function show($uid)
    {
        $user = User::where('uid', $uid)->firstOrFail();

        $discussions = Discussion::where('user_id', $user->id)->paginate(10);
        $answers = Answer::where('user_id', $user->id)->paginate(10);
        $savedDiscussions = Save::where('user_id', $user->id)->with('discussion')->paginate(10);

        return view('frontend.pages.profile.show', compact('user', 'discussions', 'answers', 'savedDiscussions'));
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

            $path = $request->file('picture')->store('public/profiles');

            if (!$path) {
                return redirect()->back()->with('error', 'Failed to save profile picture.');
            }

            $user->picture = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function setting(Request $request)
    {
        $user = Auth::user();
    
        if ($request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:8|confirmed',
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Current password is incorrect.');
            }
    
            $user->password = Hash::make($request->new_password);
            $user->save();
    
            return redirect()->back()->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Please fill out the new password fields.');
        }
    }
    

    public function settingShow()
    {
        $user = Auth::user();

        return view('frontend.pages.profile.setting', compact('user'));
    }
}
