@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $post->title }}</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <h4>{{ $post->title }}</h4>
                        <p>by {{ $post->author }} | <span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>
                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
