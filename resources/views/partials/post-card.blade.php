@php
    $full = $full ?? false;
@endphp

<div class="card bg-base-200 shadow-sm">
    @if ($post->images->count() === 1)
        <figure>
            <img src="{{ $post->images->first()->url }}" alt="Shoes" />
        </figure>
    @elseif($post->images->count() > 1)
        <div class="carousel rounded-box">
            @foreach ($post->images as $image)
                <div class="carousel-item w-full">
                    <img src="{{$image->url}}" class="w-full"
                        alt="Tailwind CSS Carousel component" />
                </div>
            @endforeach
        </div>
    @endif
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        @if ($full)
            <p>{!! $post->displayBody !!}</p>
        @else
            <p>{{ $post->snippet }}</p>
        @endif
        <div class="text-base-content/70">
            <a href="{{ route('user', $post->user) }}">{{ $post->user->name }}</a>
        </div>
        @if ($post->category)
            <a href="{{ route('category', $post->category) }}">
                <div class="badge badge-soft badge-secondary mb-1">{{ $post->category->name }}</div>
            </a>
        @endif
        <div class="text-base-content/70"><b>Comments: </b>{{ $post->comments_count }}</div>
        <div class="text-base-content/70"><b>Likes: </b>{{ $post->likes_count }}</div>
        <div>
            @foreach ($post->tags as $tag)
                <div class="badge badge-soft badge-primary mb-1">{{ $tag->name }}</div>
            @endforeach
        </div>
        <div class="card-actions justify-end">
            @if ($post->authHasLiked)
                <a href="{{ route('post.like', $post) }}" class="btn btn-error">Unlike</a>
            @else
                <a href="{{ route('post.like', $post) }}" class="btn btn-secondary">Like</a>
            @endif

            @unless ($full)
                <a href="{{ route('post', $post) }}" class="btn btn-primary">Read more</a>
            @endunless
        </div>
    </div>
</div>
