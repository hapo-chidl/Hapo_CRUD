@extends('Templates.master')

@section('title','Quản lý học sinh')

@section('content')

<?php?>
<div class="page-header"><h4>Hiển thị danh sách sinh viên</h4></div>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <p><a class="btn btn-primary" href="{{ url('/student/create') }}">Thêm mới</a></p>
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
                @foreach($listhocsinh as $key => $hocsinh)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $hocsinh->full_name}}</td>
                        <td>{{ $hocsinh->email }}</td>
                        <td><img src="{{ $hocsinh->avatar }}"></td>
                        <td>{{ $hocsinh->email }}</td>
                        <td><a href="/student/{{ $hocsinh->id }}/edit">Edit</a></td>
                        <td><a href="/student/{{ $hocsinh->id }}">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
