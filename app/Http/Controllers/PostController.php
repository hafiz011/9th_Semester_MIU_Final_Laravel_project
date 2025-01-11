<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:255',
            'location' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }


        Post::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'author' => $validated['author'],
            'location' => $validated['location'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'image' => $imagePath, // Store the image path
        ]);


        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'required|url',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);


        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'location' => $request->location,
            'image' => $request->image,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);


        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
