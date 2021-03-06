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
        hr{
            border: 3px solid #ccc;
            width: 500px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 1px 1px 8px #000;
        }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Add New Post</h3>
          </div>
          <div class="panel-body">
              <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                      @include('includes.message')
                  </div>
              </div>
              <h1 class="text-center">Add New Post</h1>
              <hr>
              <form action="{{ route('admin.blog.post.create') }}" method="post">
                  {{-- Start Title --}}
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="title" class="pull-right">Title</label>
                          </div>
                          <div class="col-md-8">
                              <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ Request::old('title') }}">
                          </div>
                      </div>
                  </div>
                  {{-- End Title --}}
                  {{-- Start Author --}}
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="author" class="pull-right">Author</label>
                          </div>
                          <div class="col-md-8">
                              <input type="text" name="author" class="form-control" id="author" placeholder="Author" value="{{ Request::old('author') }}">
                          </div>
                      </div>
                  </div>
                  {{-- End Author --}}
                  {{-- Start category --}}
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="category" class="pull-right">category</label>
                          </div>
                          <div class="col-md-6">
                              <select class="selectpicker" multiple name="cat_select[]">
                                  @foreach ($cats as $cat)
                                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  {{-- End category --}}
                  <div class="clearfix"></div>
                  {{-- Start Author --}}
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">
                              <label for="Body" class="pull-right">Body</label>
                          </div>
                          <div class="col-md-8">
                              <textarea type="text" rows="5" name="body" class="form-control" id="body" placeholder="Body">{{ Request::old('body') }}</textarea>
                          </div>
                      </div>
                  </div>
                  {{-- End Author --}}
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-2">

                          </div>
                          <div class="col-md-8">
                              <button type="submit" class="btn btn-primary">Add Post</button>
                          </div>
                      </div>
                  </div>
                  {{  csrf_field() }}
              </form>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
@endsection
