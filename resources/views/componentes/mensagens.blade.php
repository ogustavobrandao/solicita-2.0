
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif
@if(session('fail'))
    <div class="alert alert-danger text-center">
        {{ session('fail') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
@endif
