@extends('partials.layout')
@section('content')
    <div class="card bg-base-200 shadow-sm mb-2">
        <div class="card-body">
            <h1 class="card-title">{{ $user->name }}</h1>
            <table class="table table-zebra">
                <tbody>
                    <tr>
                        <th>Posts Count</th>
                        <td>{{ $user->posts()->count() }}</td>
                    </tr>

                    <tr>
                        <th>Comments Count</th>
                        <td>{{ $user->comments()->count() }}</td>
                    </tr>

                    <tr>
                        <th>Likes Count</th>
                        <td>{{ $user->likes()->count() }}</td>
                    </tr>

                    <tr>
                        <th>Comments on Users posts Count</th>
                        <td>{{ $user->commentsOnPosts()->count() }}</td>
                    </tr>
                     <tr>
                        <th>Likes on Users posts Count</th>
                        <td>{{ $user->likesOnPosts()->count() }}</td>
                    </tr>
                    <tr>
                        <th>Followers</th>
                        <td>{{ $user->followers()->count() }}</td>
                    </tr>
                    <tr>
                        <th>Followees</th>
                        <td>{{ $user->followees()->count() }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="card-actions justify-end">
                @if($user->id !== auth()->user()->id)
                    @if($user->authHasFollowed)
                        <a href="{{route('follow', $user)}}" class="btn btn-error btn-block">Unfollow</a>
                    @else
                        <a href="{{route('follow', $user)}}" class="btn btn-primary btn-block">Follow</a>
                    @endif
                @endif

            </div>
        </div>

    </div>
    {{ $posts->links() }}
    <div class="grid grid-cols-4 gap-2">
        @foreach($posts as $post)
            @include('partials.post-card')
        @endforeach
    </div>
@endsection
