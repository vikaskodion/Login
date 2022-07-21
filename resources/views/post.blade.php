@extends('layouts.app')
@section('content')      
<style>@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");body{background-color: #eee;font-family: "Poppins", sans-serif;font-weight: 300}.card{border:none}.ellipsis{color: #a09c9c}hr{color: #a09c9c;margin-top: 4px;margin-bottom: 8px}.muted-color{color: #a09c9c;font-size: 13px}.ellipsis i{margin-top: 3px;cursor: pointer}.icons i{font-size: 25px}.icons .fa-heart{color: red}.icons .fa-smile-o{color: yellow;font-size: 29px}.rounded-image{border-radius: 50%!important;display: flex;justify-content: center;align-items: center;height: 50px;width: 50px}.name{font-weight: 600}.comment-text{font-size: 12px}.status small{margin-right: 10px;color: blue}.form-control{border-radius: 26px}.comment-input{position: relative}.fonts{position: absolute;right: 13px;top:8px;color: #a09c9c}.form-control:focus{color: #495057;background-color: #fff;border-color: #8bbafe;outline: 0;box-shadow: none}</style>
<div class="container-md-12 mt-3">  
  <div class="container mt-5 mb-5">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="d-flex justify-content-between p-2 px-3">
            <div class="d-flex flex-row align-items-center"> <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" width="50" class="rounded-circle">
              <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">{{$data->post_name}}</span></div>
            </div>
              <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small> <i class="fa fa-ellipsis-h"></i> </div>
                </div> <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" class="img-fluid"><br>               
                  <div class="row d-flex flex-column ml-2">
                    <h5><b>tags:</b> {{$data->post_tag}}</h5>
                  </div> 
               <div class="p-2">
                  <h6 >{{$data->small_desc}}</h6>
                   <p class="row d-flex flex-column ml-2">{!! $data->detailed_desc !!}</p>
                   <hr>
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fa fa-heart"></i> <i class="fa fa-smile-o ml-2"></i> </div>
                      <div class="d-flex flex-row muted-color"> <span>2 comments</span> <span class="ml-2">Share</span> </div>
                   </div>
                   <hr>
                   <div class="comments" id="comments">
                   @foreach($rev_data as $rev)
                     <div class="d-flex flex-row mb-2"> <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" width="40" class="rounded-image">
                        <div class="d-flex flex-column ml-2"> <span class="name">Rating:- {{$rev["rating"]}} Star</span> <small class="comment-text">{{$rev["comment"]}}</small>
                          <div class="d-flex flex-row align-items-center status"> <small>{{Auth::user()->id}}Like</small> <small>Reply</small>
                            @if(Auth::user()->id == $data->user_id)
                            <small><a class="text-danger" style="text-decoration: none;" href="{{ route('delete_comment',$rev["id"]) }}" title="Delete this comment"><b>Delete</b></a></small>
                            @endif
                            <small class="text-success">{{date("d-m-Y h:i a", strtotime($rev["created_at"])) }}</small> </div>
                        </div>
                     </div>
                     @endforeach
                    </div>
                  </div>
                  {!! $rev_data->render() !!}
                </div>
              </div>
            </div>
          </div>
  
  <div class="row">
          <div class="col">
            
        <section style="background-color: #ffffff;">
            <form name="postSlugForm" id="postSlugForm" method="post">
            <div class="container my-5 py-5 text-dark">
              <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-8 col-xl-8">
                  <div class="card">
                    <div class="card-body p-4 border">
                      <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                          src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" alt="avatar" width="65"
                          height="65" />
                        <div class="w-100">
                          <h5>Add a comment</h5>
                         
                         <div class="row">
                            <input type="hidden" value="{{$data->id}}" name="post_id" id="post_id">
                            <div class="input-group pb-4">
                                <label for="firstname" class="form-label">Select A Rating</label>
                                <select class="form-select w-100" name="rating" id="rating" style="font-size: 15px">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                
                         </div>
                          <div class="form-outline">
                            <label class="form-label" for="comment">What is your view?</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                          </div>
                          <div class="d-flex justify-content-between mt-3">
                            {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
                            <button type="button" class="btn btn-success" id="save_review">
                              Submit <i class="fas fa-long-arrow-alt-right ms-1"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>
          </section>
        </div>
      </div>
    </div>
    

@endsection

@section("scripts")
<script>
$(document).ready(function(){
    $("#save_review").click(function(){
        var rate= $("#rating").val();
        var comm= $("#comment").val();
        var p_id= $("#post_id").val();
        var csrf_token = "{{ csrf_token() }}";
   
        $.ajax({
          url: "{{ route('saveReview') }}",
          type: "POST",
          data: {"rating": rate, "comment": comm, "post_id": p_id, "_token": csrf_token},
          success: function(resp) {
            $("#postSlugForm")[0].reset();
            var new_comment = `<div class="d-flex flex-row mb-2"> <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(21).webp" width="40" class="rounded-image">
                        <div class="d-flex flex-column ml-2"> <span class="name">Rating:- `+rate+` Star</span> <small class="comment-text">`+comm+`</small>
                          <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                        </div>
                     </div>`;
            // var new_comm_tr = "<tr><td>"+rating+"</td><td>"+comment+"</td></tr>";
            var old_comments = $("div#comments").html();
            $("div#comments").html(old_comments + new_comment);
                      }
        });
    });
});
</script>
@endsection
