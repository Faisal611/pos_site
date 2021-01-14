@extends('layout.main')
@section('middleArea')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- DataTales Form -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-body">

                        <form action="{{ url('users_postGroup') }}" method="POST">
                            @csrf
                            <div class="row">
                                <label for="name" class="col-md-2 col-form-label">User Groups</label>
                                <div class="col-md-10 col-form-label">

                                    <select name="group_id" id="customers" class=" form-control">
                                        <option value="">Select Group</option>
                                        @foreach($userGroups as $key => $userGroup)
                                            <option value="{{ $key }}"> {{ $userGroup }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email"
                                               placeholder="Please Your Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               placeholder="Please Your Phone Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="address"
                                               placeholder="Please Your Address">
                                    </div>
                                </div>
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
