@extends('layouts.admin-master')

@section('styles')
    <style media="screen">
        .panel{
            box-shadow: 1px 1px 5px #fff;
        }
        .content{
            background-color: #34495e;color:#fff; margin: 2px 2px; padding: 5px 0px; border-radius: 5px; box-shadow: 6px 6px 4px #34495e;
            margin-top: 20px;
        }
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
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('admin.blog.edit_post', ['id' => $post->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('admin.blog.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a>
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
