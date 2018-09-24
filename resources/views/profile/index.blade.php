@extends('adminlte::layouts.app')

@section('htmlheader_title')
User Profile
@endsection


@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">User Profile<h3> {{Auth::user()->name}}</h3></div>
  <div class="panel-body">

  <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/updateprofile')}}">
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
<input id="email" type="text" name="email" value="{{ $user->email }}">
@if ($errors->has('email'))
 <strong>{{ $errors->first('email') }}</strong>
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

