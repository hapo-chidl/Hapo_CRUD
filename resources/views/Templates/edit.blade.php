@extends('Templates.master')

@section('title','Quản lý học sinh')

@section('content')

<div class="page-header"><h4>Quản lý học sinh</h4></div>

<?php ?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php ?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<?php ?>
<p><a class="btn btn-primary" href="/{{ url('/student') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
	<center><h4>Sửa học sinh</h4></center>
	<form action="{{ url('/student') }}" method="post">
		@csrf
		<input type="hidden" id="id" name="id" value="{!! $getHocSinhById[0]->id !!}" />
        <div class="form-group">
			<label for="Fullname">Tên học sinh</label>
			<input type="text" class="form-control" id="Fullname" name="Fullname" placeholder="Tên học sinh" maxlength="255" value="{{ $getHocSinhById[0]->Fullname}}" required />
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email"  name="email" placeholder="Email" maxlength="15" value="{{ $getHocSinhById[0]->email}}" required />
		</div>		
        <div class="form-group">
			<label for="address">Address</label>
			<input type="text" class="form-control" id="address"  name="address" placeholder="Address"  value="{{ $getHocSinhById[0]->address}}" required />
		</div>	
        <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" id="avatar" name="avatar" placeholder="avatar"  value="{{ $getHocSinhById[0]->avatar}}" required/>
        </div>
		<center><button type="submit" class="btn btn-primary">Lưu lại</button></center>
	</form>
</div>

@endsection