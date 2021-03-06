@extends('student.master')

@section('title', 'Quản lý học sinh')

@section('content')

<div class="page-header"><h4>Hiển thị danh sách sinh viên</h4></div>
@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	    </button>
    </div>
@endif
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <p><a class="btn btn-primary" href="{{ route('student.create') }}">Thêm mới</a></p>
            <table class="table table-bordered table-hover" id="DataList">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Avarta</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($listStudent as $key => $student)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td><img src="{{ asset('/storage/images/student/' . $student->avatar) }}"></td>
                        <td>{{ $student->email }}</td>
                        <td><a href="{{ route('student.edit', $student->id) }}">Edit</a></td>
                        <td><a href="{{ route('student.destroy', $student->id) }}"class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
