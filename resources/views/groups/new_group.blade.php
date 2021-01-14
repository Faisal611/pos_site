@extends('layout.main')
@section('middleArea')

<!-- DataTales Form -->
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ url('create_postGroup') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Group Title</label>
                            <input type="text" name="title" class="form-control" id="title"
                                   aria-describedby="title" placeholder="Group Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DataTales Form -->

@endsection()
