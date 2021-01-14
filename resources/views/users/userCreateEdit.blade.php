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
                        @if( session('success') )
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if( session('error') )
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ url('update_user_data') }}" method="POST">
                            @csrf
                            <div class="row">
                                <label for="name" class="col-md-2 col-form-label">User Groups</label>
                                <div class="col-md-10 col-form-label">

                                    <select name="group_id" id="customers" class=" form-control">
                                        <option value="">Select Group</option>
                                        @foreach($groups as $userGroup)
                                            <option
                                                value="{{ $userGroup->id }}"
                                                @if($userGroup->id == $userData->group_id)
                                                selected
                                                @endif
                                            >
                                                {{ $userGroup->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Name" value="{{ $userData->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email"
                                               placeholder="Please Your Email" value="{{ $userData->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               placeholder="Please Your Phone Number" value="{{ $userData->phone }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" class="form-control" id="address"
                                               placeholder="Please Your Address" value="{{ $userData->address }}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $userData->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Form -->
@endsection()
