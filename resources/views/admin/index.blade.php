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
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('includes.message')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="{{ route('admin.blog.create_post') }}" class="btn btn-primary btn-sm">New Post</a>
                <a href="{{ route('admin.blog.index') }}" class="btn btn-info btn-sm">Show All Posts</a>
              </div>
              <div class="panel-body">
                  @if (count($posts) == 0)
                      <div class="alert alert-warning">No Posts</div>
                  @endif
                  @if (count($posts) > 0)
                      @foreach ($posts as $post)
                          <div class="row content">
                              <div class="col-md-12">
                                  <p>{{ $post->title }}</p>
                                  <p>
                                      {{ $post->author }} | {{ $post->created_at }}
                                  </p>
                                  <a href="{{ route('admin.blog.post', ['postid' => $post->id]) }}" class="btn btn-sm btn-primary" style="display: inline-block !important;">View</a>
                                  <a href="{{ route('admin.blog.edit_post', ['id' => $post->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                  <a href="{{ route('admin.blog.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">delete</a>
                              </div>
                          </div>
                      @endforeach
                  @endif

              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <a href="#" class="btn btn-danger btn-sm">Show All Messages</a>
              </div>
              <div class="panel-body">
                  <div class="row content">
                      <div class="col-md-12">
                          <p>Title</p>
                          <p>
                              Person | Date
                          </p>
                          <a href="#" class="btn btn-sm btn-primary show" style="display: inline-block !important;">View</a>
                          <a href="#" class="btn btn-sm btn-danger">delete</a>
                      </div>
                  </div>
                  <div class="row content">
                      <div class="col-md-12">
                          <p>Title</p>
                          <p>
                              Person | Date
                          </p>
                          <a href="#" class="btn btn-sm btn-primary show" style="display: inline-block !important;">View</a>
                          <a href="#" class="btn btn-sm btn-danger">delete</a>
                      </div>
                  </div>
                  <div class="row content">
                      <div class="col-md-12">
                          <p>Title</p>
                          <p>
                              Person | Date
                          </p>
                          <a href="#" class="btn btn-sm btn-primary show" style="display: inline-block !important;">View</a>
                          <a href="#" class="btn btn-sm btn-danger">delete</a>
                      </div>
                  </div>
                  <div class="row content">
                      <div class="col-md-12">
                          <p>Title</p>
                          <p>
                              Person | Date
                          </p>
                          <a href="#" class="btn btn-sm btn-primary show" style="display: inline-block !important;">View</a>
                          <a href="#" class="btn btn-sm btn-danger">delete</a>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    {{-- Message Modal Start --}}
    <div class="modal fade" id="Show-Modal" role="dialog" tabindex="-1">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<button aria-label="Close" class="close" data-dismiss="modal" type="button">
    					<span aria-hidden="true">&times;</span>
    				</button>
    				<h4 class="modal-title">
    					Modal title
    				</h4>
    			</div>
    			<div class="modal-body">
    				<p>
    					One fine body&hellip;
    				</p>
    			</div>
    			<div class="modal-footer">
    				<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
    				<button class="btn btn-primary" type="button">Save changes</button>
    			</div>
    		</div><!-- /.modal-content -->
    	</div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    {{-- Message Modal End --}}
@endsection
@section('scripts')
    <script type="text/javascript">
    var token = "{{ Session::token() }}";
    $('.show').click(function (event) {
        event.preventDefault();
        $('#Show-Modal').modal();
    });
    </script>
@endsection
