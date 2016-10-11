@extends('layouts.master')


@section('title')
    Blog Index
@endsection

@section('styles')
    <style media="screen">
    .post{
        background-color: #f2f2f2;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #ccc;
        padding: 5px 10px;
    }
    </style>
@endsection

@section('content')
    <div class="row">
    	<!-- Blog Entries Column -->
    	<div class="col-md-8 col-md-offset-2">
            <h1 class="page-header">
                Time Line
            </h1><!-- First Blog Post -->
            @if (count($posts) == 0)
                <div class="alert alert-warning">No Posts</div>
            @endif
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    {{-- Start Post --}}
                    <div class="post">
                        <h4>{{ $post->title }}</h4>
                        <p>by <a href="index.php">{{ $post->author }}</a> At {{ $post->created_at }}</p>
                        <p>{{ $post->body }}</p>
                        <a class="btn-link" href="{{ route('blog.single', ['postid' => $post->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <hr>
                    {{-- End Post --}}
                @endforeach
            @endif
            <div class="text-center">
            	{{ $posts->links() }}
            </div>
    	</div>
    </div><!-- /.row -->
@endsection
