
@extends('student.master') 

@section('title','Quản lý học sinh') 

@section('content')

<div class="page-header">
    <h4>Quản lý học sinh</h4>
</div>
@if ( Session::has('success') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong> 
	    <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span></button>
    </div>
@endif 

@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong> 
	    <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span> <span class="sr-only">Close</span></button>
    </div>
@endif 

<p><a class="btn btn-primary" href="{{ route('student.index') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
    <center><h4>Sửa học sinh</h4></center>
    <form action="{{ route('student.store') }}" method="post">
        @csrf 
        <input type="hidden" id="id" name="id" value="{!! $getStudent ->id !!}" />
	    <div class="form-group">
		    <label for="full_name">Tên học sinh</label>
		    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Tên học sinh" maxlength="255" value="{{ $getStudent->full_name}}" required />
		</div>
		<div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control" id="email"  name="email" placeholder="Email" maxlength="15" value="{{ $getStudent->email}}" required />
        </div>		
        <div class="form-group">
	        <label for="address">Address</label>
	        <input type="text" class="form-control" id="address"  name="address" placeholder="Address"  value="{{ $getStudent->address}}" required />
        </div>	 
		<div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" id="avatar" name="avatar" placeholder="avatar"  value="{{ $getStudent->avatar}}" required/>
        </div>
	    <center><button type="submit" class="btn btn-primary">Lưu lại</button></center>
	</form>
</div>
@endsection
