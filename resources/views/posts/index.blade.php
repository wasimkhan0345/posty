@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="col-lg-10 mr-auto ml-auto" style="background-color: #fff; color: #000; margin-top:20px;padding: 10px;">
            <div class="col-lg-12">
                <form action="{{ route('posts') }}" method="POST">
                    @csrf

                    @if(session('status'))
                        <div class="col-lg-12 text-danger">{{ session('status') }}</div>
                    @endif

                    <div class="form-group">
                        <textarea name="body" id="" cols="30" rows="5" class="form-control"></textarea>
                        @error('body')
                            <div class="col-lg-12 text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-xs" name="Post" value="Post">
                    </div>
                </form>
            </div>

            <div class="col-lg-12">
                @if($posts->count())
                    @foreach($posts as $post)
                        <div class="col-lg-12">
                            <a href="">{{ $post->user->name }}</a> <span>{{ $post->created_at->diffForHumans() }}</span>
                            <p>{{ $post->body }}</p>
                            <div class="col-lg-12" style="margin-bottom: 15px;">
                                @if(!$post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes', $post->id) }}" method="post" style="float: left; margin-right:10px">
                                        @csrf
                                        <input type="submit" class="btn btn-primary btn-xs pull-left" value="Like">
                                    </form>
                                @else
                                    <form action="" method="post" style="float: left;">
                                        @csrf
                                        <input type="submit" class="btn btn-primary btn-xs pull-left" value="Dislike">
                                    </form>
                                @endif
                                <span style="margin-left: 10px; float: left; margin-top: 7px;">{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count()) }}</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-lg-12">
                        {{ $posts->links() }}
                    </div>
                @else
                    There is no posts
                @endif
            </div>
        </div>
    </div>
@endsection
