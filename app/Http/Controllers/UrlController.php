<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function store(Request $request)
    {

        // dd(Auth::id());
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $shortCode = Str::random(6);
        $url = new Url();

        $url->long_url = $request->long_url;
        $url->short_url = $shortCode;
        $url->user_id = Auth::id();

        $url->save();

        return redirect()->route('url.list')->with('success', 'Short URL generated successfully.');
    }

    public function shortenUrl($code)
    {
        $url = Url::where('short_url', $code)->firstOrFail();
        $url->increment('clicks');
        return redirect($url->long_url);
    }

    public function list()
    {
        $datas = Url::where('user_id',Auth::id())->get();

        return view('list')->with(compact('datas'));
       
    }

    public function stats()
    {
        $urls = Auth::user()->urls()->latest()->paginate(10);
        return view('stats', compact('urls'));
    }
}
