@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 w-1/2 mx-auto">

        <div class="card-body">
            <h2 class="card-title">New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Title</legend>
                    <input value="{{ old('title') }}" name="title" type="text" class="input w-full @error('title') input-error @enderror" placeholder="Title" />
                    @error('title')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Content</legend>
                    <textarea name="body" class="textarea h-48 w-full @error('body') textarea-error @enderror" placeholder="Write something cool...">{{ old('body') }}</textarea>
                     @error('body')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                 <fieldset class="fieldset">
                    <legend class="fieldset-legend">Image</legend>
                    <input multiple accept="image/*" name="image[]" type="file" class="file-input w-full @error('image') input-error @enderror"/>
                    @error('image')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
