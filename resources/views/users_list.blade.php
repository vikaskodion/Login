

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users List') }}</div>

                <div class="card-body">

<div class="container mt-3">
            
  <table class="table table-striped" border="1">
    <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Address</th>
       <th scope="col">Email</th>
       <th scope="col">Role</th>
       <th scope="col">Update / Delete</th>

    </tr>
  </thead>
  <?php
  $roles = [1 => "Admin", 2 => "Member", 3 => "Customer Service"];
  ?>
    @foreach($users as $user)
  <tr>
      <td scope="col">{{$user['id']}}</td>
      <td scope="col">{{$user['name']}}</td>
      <td scope="col">{{$user['lastname']}}</td>
      <td scope="col">{{$user['address']}}</td>
      <td scope="col">{{$user['email']}}</td>
      @if(!empty($user['role']))
      <td scope="col">{{$roles[$user['role']]}}</td>
      @else
      <td scope="col">N/A</td>
      @endif
      <td scope="col">
                      <form action="{{url('user/delete/'.$user->id)}}" method="post">
                        @csrf 
                        
                        <a href="{{ url('edit',$user->id) }} " class="btn btn-success">Edit</a>
                      <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm"></form>
      </td>
      
    </tr>
    @endforeach
   
</table>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection



