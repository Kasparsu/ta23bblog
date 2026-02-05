<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the deleted resource.
     */
    public function deleted()
    {
        $posts = Post::onlyTrashed()->latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $post = new Post($request->validated());
        $post->user()->associate(Auth::user());
        $post->save();
        foreach($request->file('image') as $img) {
            $image = new Image();
            $image->path = $img->store('', ['disk'=>'public']);
            $image->post()->associate($post);
            $image->save();
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('posts.index');
    }

    /**
     * Soft delete the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function permaDestroy($post)
    {
        $post = Post::onlyTrashed()->findOrFail($post);
        $post->forceDelete();
        return redirect()->route('posts.index');
    }

    /**
     * Restore soft deleted resource.
     */
    public function restore($post)
    {
        $post = Post::onlyTrashed()->findOrFail($post);
        $post->restore();
        return redirect()->route('posts.index');
    }
}
