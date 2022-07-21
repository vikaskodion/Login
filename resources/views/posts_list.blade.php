

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Posts') }} <a href="{{ route('new_post'); }}" class="btn btn-sm btn-primary">New Post</a></div>

                <div class="card-body">
                @if($errors->any())
                @foreach ($errors->all() as $error)
                  <div class="text-danger">{{$error}}</div>
                @endforeach
              @endif
    <div class="container mt-3">
            
  <table class="table table-striped" border="1">
    <thead>
    <tr>
      <th class="col ">Sr no</th>
      <th class="col">Post Name</th>
      <th class="col">Post Slug</th>
      <th class="col">Post Tag</th>
       <th class="col">Post Status</th>
       <th class="col">Small description</th>
       <th class="col">Detail description</th>
      <th class="col">Action</th>
    </tr>
  </thead>
    @foreach($posts as $post)
  @if($post['post_status'] != 2) 
  <tr>
      <td class="col">{{$post['id']}}</td>
      <td class="col"><a href="{{ route('post',$post['post_slug']) }}">{{$post['post_name']}}</a></td>
      <td class="col">{{$post['post_slug']}}</td>
      <td class="col">{{$post['post_tag']}}</td>
      <td class="col">
        <strong>
          @if(!empty($post['post_status']))
            <span class="text-success">Published</span>
          @else
            <span class="text-danger">Unpublished</span>
          @endif
        </strong>
      </td>
      <td class="col">{{$post['small_desc']}}</td>
      <td class="col">{{ $post['detailed_desc'] }}</td>
      <td class="col-sm-4">
        @if(Auth::user()->role==1 && empty($post['post_status']))    
          <a href="{{ route('approve_post', ["id" => $post['id']]) }} " class="btn btn-info">Publish</a>
        @endif
        <a href="{{ route('edit_post',$post['id']) }} " class="btn btn-success">Edit</a>
        <a href="{{ url('delete_post',$post['id']) }} " class="btn btn-danger">Delete</a>
        <a href="{{ route('post',$post['post_slug']) }} " class="btn btn-primary">View</a>
        <a href="{{ route('archive',$post['id']) }} " class="btn btn-info">Archive</a>
      </td>
    </tr>
    @endif
    @endforeach
   
</table>
{!! $posts->render() !!}
</div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection



