@extends('layouts.app')

@section('content')
<?php //print_r($data->post_slug); die;?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create New Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <form method="post" action="{{ route('save_post') }}">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="Postname" class="col-md-4 col-form-label text-md-end">{{ __('Post Name') }}</label>

                            <div class="col-md-6">
                                <input id="postname" type="text" class="form-control @error('postname') is-invalid @enderror" name="postname" value="{{$data->post_name}}" required autocomplete="postname" autofocus>

                                @error('postname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                            
                            <div class="row mb-3">
                                <label for="postslug" class="col-md-4 col-form-label text-md-end">{{ __('Post Slug') }}</label>
    
                                <div class="col-md-6">
                                    <input id="postslug" type="text" class="form-control @error('postslug') is-invalid @enderror" name="postslug" value="{{$data->post_slug}}" required autocomplete="postslug" autofocus>
    
                                    @error('postslug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="posttag" class="col-md-4 col-form-label text-md-end">{{ __('Post Tag') }}</label>
    
                                <div class="col-md-6">
                                    <input id="posttag" type="text" class="form-control @error('posttag') is-invalid @enderror" name="posttag" value="{{$data->post_tag}}" required autocomplete="posttag" autofocus>
    
                                    @error('posttag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            
    
                            <div class="row mb-3">
                                <label for="smalldes" class="col-md-4 col-form-label text-md-end">{{ __('Small description') }}</label>
    
                                <div class="col-md-6">
                                    <input id="smalldes" type="text" class="form-control @error('smalldes') is-invalid @enderror" name="smalldes" value="{{$data->small_desc}}" required autocomplete="smalldes" autofocus>
    
                                    @error('smalldes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="detaildes" class="col-md-4 col-form-label text-md-end">{{ __('Detail description') }}</label>
    
                                <div class="col-md-6">
                                    
                                     <textarea rows="5" id="detaildes" class="form-control @error('detaildes') is-invalid @enderror" name="detaildes" >{{$data->detailed_desc}}</textarea> 
                                    @error('detaildes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="row">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                    </button>
                                </div>
                                
                            </div>
                                  
                                  
                                  
                            </div>
                        </div>
                    </form>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
