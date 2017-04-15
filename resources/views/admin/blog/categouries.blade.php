@extends('layouts.admin-master')

@section('styles')
    <style media="screen">
        .panel{
            box-shadow: 1px 1px 5px #fff;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cat_name" placeholder="Cat Name">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" id="addCat" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="panel-body" style="padding: 25px;">
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cats as $cat)
                                    <tr>
                                        <th style="width: 40px;">{{ $cat->id }}</th>
                                        <td class="name" data-idedit="{{ $cat->id }}">{{ $cat->name }}</td>
                                        <td><a href="#" class="btn btn-success edit">Edit</a></td>
                                        <td><a href="{{ route('admin.cats.delete', ['id' => $cat->id]) }}" class="btn btn-danger delete">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        var token = "{{ csrf_token() }}",
            addroute = "{{ route('admin.cats.store') }}",
            editroute = "{{ route('admin.cats.update') }}";
    </script>
    <script type="text/javascript" src="{{ asset('backend/js/cats.js') }}"></script>
@endsection
