@extends('layout.main')
@section('middleArea')
    @if( session('message') )
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3> User </h3>
            </div>
            <div class="col-md-6 text-right new_group">
                <a class="btn btn-primary" href="{{ url('users_post') }}">New Users</a>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>group_id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>group_id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>address</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach( $users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ strtoupper($user->group->title) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="text-right">
                                    <a href="{{ url('edit/'.$user->id) }}"
                                       class="color_btn btn btn-outline-success"><i class="fa fa-user-edit"></i></a>
                                    <form action="{{ url('delete/' .$user->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
