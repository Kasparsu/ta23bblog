@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">

        <div class="card-body">
            <h2 class="card-title">Edit Post</h2>
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Title</legend>
                    <input value="{{ old('title', $post->title) }}" name="title" type="text" class="input w-full @error('title') input-error @enderror" placeholder="Title" />
                    @error('title')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Content</legend>
                    <textarea name="body" class="textarea h-48 w-full @error('body') textarea-error @enderror" placeholder="Write something cool...">{{ old('body', $post->body) }}</textarea>
                     @error('body')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
