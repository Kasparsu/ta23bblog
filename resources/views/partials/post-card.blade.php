@php
    $full = $full ?? false;
@endphp

<div class="card bg-base-200 shadow-sm">
    {{-- <figure>
                    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
                </figure> --}}
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        @if($full)
            <p>{!! $post->displayBody !!}</p>
        @else
            <p>{{ $post->snippet }}</p>
        @endif
        <div class="text-base-content/70">
            <a href="{{route('user', $post->user)}}">{{ $post->user->name }}</a>
        </div>
        <div class="text-base-content/70"><b>Comments: </b>{{ $post->comments_count }}</div>
        <div class="text-base-content/70"><b>Likes: </b>{{ $post->likes_count }}</div>
        <div>
            @foreach($post->tags as $tag)
                <div class="badge badge-soft badge-primary mb-1">{{$tag->name}}</div>
            @endforeach
        </div>
        <div class="card-actions justify-end">
            @if($post->authHasLiked)
                <a href="{{ route('post.like', $post) }}" class="btn btn-error">Unlike</a>
            @else
                <a href="{{ route('post.like', $post) }}" class="btn btn-secondary">Like</a>
            @endif

            @unless($full)
                <a href="{{ route('post', $post) }}" class="btn btn-primary">Read more</a>
            @endunless
        </div>
    </div>
</div>
