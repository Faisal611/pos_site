@extends('layout.main')
@section('middleArea')
<div class="container-fluid">

    @if( session('message') )
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <h3> User Group </h3>
        </div>
        <div class="col-md-6 text-right new_group">
            <a class="btn btn-primary" href="{{ url('create_newGroup') }}" >New Group</a>
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
                            <th>Title</th>
                            <th  class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th  class="text-right">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $id = 0;
                        @endphp
                        @foreach( $groups as $group )
                            @php
                                $id++;
                            @endphp
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $group->title }}</td>
                                <td class="text-right">
                                    <form action="{{ url('delete/'.$group->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"> Delete </i>
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
@endsection()
