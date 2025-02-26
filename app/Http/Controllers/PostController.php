<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post.index',compact('post'));
    }
    public function create(){
        return view ('post.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
        if ($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $validated['user_id'] = $request->user()->id;
    }
}
