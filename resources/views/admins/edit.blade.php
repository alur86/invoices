@extends('adminlte::layouts.app')

@section('htmlheader_title')
Edit User 
@endsection


@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading"><h3>Edit User</h3></div>
  <div class="panel-body">

  <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/updateuser')}}">
  <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
  {{ csrf_field() }}
 <label for="avatar" class="col-md-4 control-label">Avatar</label>
 <div class="col-md-6">
  <input type="file" name="avatar">
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">                    
@if ($errors->has('avatar'))
 <strong>{{ $errors->first('avatar') }}</strong>
@endif
 </div>


 <div class="col-md-6">
 <label for="name" class="col-md-4 control-label">Name</label>
 <div class="col-md-6">
<input id="name" type="text" name="name" value="{{ $user->name }}">
@if ($errors->has('name'))
 <strong>{{ $errors->first('name') }}</strong>
@endif
 </div>


 <label for="email" class="col-md-4 control-label">Email</label>
 <div class="col-md-6">
<input id="email" type="text" name="email"  readonly value="{{ $user->email }}">
@if ($errors->has('email'))
 <strong>{{ $errors->first('email') }}</strong>
@endif
 </div>



 <label for="passwword" class="col-md-4 control-label">Password</label>
 <div class="col-md-6">
<input id="password" type="password" name="password">
@if ($errors->has('password'))
 <strong>{{ $errors->first('password') }}</strong>
@endif
 </div>




 <label for="confirm_password" class="col-md-4 control-label">Confirm Paswword</label>
 <div class="col-md-6">
<input id="confirm_password" type="password" name="confirm_password">
@if ($errors->has('confirm_password'))
 <strong>{{ $errors->first('confirm_password') }}</strong>
@endif
 </div>



<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
 <i class="fa fa-btn fa-user"></i> Update
</button>
</div>
</div>

  
@endsection















