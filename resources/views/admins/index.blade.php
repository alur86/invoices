@extends('adminlte::layouts.app')

@section('htmlheader_title')
Admins
@endsection

@section('main-content')
  <div class="container spark-screen">
  <div class="row">
  <div class="col-md-10 col-md-offset-1">
  <div class="panel panel-default">
  <div class="panel-heading">Users</div>
  <div class="panel-body">
  <div class="panel-body">               
       <table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Name</th>  
            <th>Email</th>   
            <th>Created At</th> 
            <th>Updated At</th> 
            <th>Avatar</th> 
            <th>User Type</th>  
            <th>Actions</th>    
          </tr>  
        </thead>  
        <tbody> 
       @foreach( $users as $user) 
         <tr> 
            <td> {{ $user->name }}  </td>  
            <td> {{ $user->email }} </td>  
            <td><span class="glyphicon glyphicon-calendar" id="date"></span>  {{ $user->created_at }} </td>  
            <td> <span class="glyphicon glyphicon-calendar" id="date"></span> {{ $user->updated_at }} </td>  
            <td>  <img src="uploads/avatars/{{ $user->avatar}}" class="img-thumbnail" height="72" width="72" alt="user avatar">  </td>      
            <td> @if ($user->is_admin == 1)
              admin  
                @else 
              user      
              @endif 
              </td> 
          <td><a href="{{ URL::to('/user-edit/'.$user->id) }}" class="glyphicon glyphicon-pencil" title="Edit User">Edit User</a></td> 
    <td><form action="{{ URL::to('delete/'.$user->id )}}" method="POST" class="pull-right">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input class="btn btn-danger" type="submit" value="Delete">
     </form>
       </td>  
           @endforeach   
             </tr> 
<td><a href="{{ URL::to('/add/') }}" class="glyphicon glyphicon-pencil" title="Add User">Add User</a></td> 
         </tbody>  
         </table> 
   {!! $users->links() !!}
  
        </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
     
