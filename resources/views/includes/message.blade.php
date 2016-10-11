


@if (Session::has('fail'))
    <div class="alert alert-danger">
        <span class="glyphicon glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
        {{ Session::get('fail') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
        {{ Session::get('success') }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger btn-sm">
        <span class="glyphicon glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
