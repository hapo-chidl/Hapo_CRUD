@extends('Templates.master')
@section('title','Thêm mới học sinh') 
@section('content')
<div class="page-header">
    <h4>Quản lý học sinh</h4>
</div>
@if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong> 
	    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
	        <span aria-hidden="true">&times;</span> 
	        <span class="sr-only">Close</span>
	    </button>
    </div>
@endif 
@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong> 
	    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
		    <span aria-hidden="true">&times;</span> 
		    <span class="sr-only">Close</span>
	    </button>
    </div>
@endif 
<p><a class="btn btn-primary" href="{{ url('/student') }}">Về danh sách</a></p>
<div class="col-xs-4 col-xs-offset-4">
    <h4>Thêm học sinh</h4>
    <form action="{{ url('student') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="Fullname">Full name</label>
			<input class="form-control" id="full_name" maxlength="255" name="full_name" placeholder="Fullname" required="" type="text">
			@if ($errors->has('Fullname'))
                <div class="alert alert-danger">
                    {{ $errors->first('Fullname') }}
                </div>
			@endif
        </div>
        <div class="form-group">
            <label for="email">Email</label> 
			<input class="form-control" id="email" name="email" placeholder="Email" required="" type="text"> 
			@if ($errors->has('email'))
                <div class="alert alert-danger">
                    {{ $errors->first('email') }}
                </div>
			@endif
        </div>
        <div class="form-group">
            <label for="address">Address</label> 
			<input class="form-control" id="address" name="address" placeholder="Address" required="" type="text"> 
			@if ($errors->has('address'))
                <div class="alert alert-danger">
                    {{ $errors->first('address') }}
                </div>
			@endif
        </div>
        <div class="form-group">
            <label for="avatar">Avarta</label> <input id="avatar" name="avatar" placeholder="avatar" type="file">
        </div>
		<button class="btn btn-primary" type="submit">Thêm</button>
    </form>
</div>
@endsection
	
