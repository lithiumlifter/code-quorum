<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $latestDiscussions = Discussion::with('tags', 'user')
            ->orderBy('created_at', 'desc')->limit(9)->get();

        return view('frontend.home', compact('latestDiscussions'));
    }
}
