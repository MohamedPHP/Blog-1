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
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @include('includes.message')
                </div>
            </div>
            <div class="row">
                 <!-- Blog Entries Column -->
                 <div class="col-md-8 col-md-offset-2">
                      <h3>
                          Time Line
                      </h3><!-- First Blog Post -->
                      <hr>
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
                                  <a class="btn-link" href="{{ route('admin.blog.post', ['postid' => $post->id]) }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
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
        </div>
    </div>
@endsection
