@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    <form method="post" action="{{route('posts')}}">
                        @csrf
                       
                        <div class="row mb-3">
                            <label for="Postname" class="col-md-4 col-form-label text-md-end">{{ __('Post Name') }}</label>

                            <div class="col-md-6">
                                <input id="postname" type="text" class="form-control @error('postname') is-invalid @enderror" name="postname" value="{{ $posts$->name;}}" required autocomplete="postname" autofocus>

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
                                    <input id="postslug" type="text" class="form-control @error('postslug') is-invalid @enderror" name="postslug" value="{{ $posts->name;}}" required autocomplete="postslug" autofocus>
    
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
                                    <input id="posttag" type="text" class="form-control @error('posttag') is-invalid @enderror" name="posttag" value="{{ $posts->name;}}" required autocomplete="posttag" autofocus>
    
                                    @error('posttag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Poststatus" class="col-md-4 col-form-label text-md-end">{{ __('Post status') }}</label>
    
                                <div class="col-md-6">
                                    <input id="poststatus" type="text" class="form-control @error('poststatus') is-invalid @enderror" name="poststatus" value="{{ $posts->name;}}" required autocomplete="poststatus" autofocus>
    
                                    @error('poststatus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="smalldes" class="col-md-4 col-form-label text-md-end">{{ __('Small description') }}</label>
    
                                <div class="col-md-6">
                                    <input id="smalldes" type="text" class="form-control @error('smalldes') is-invalid @enderror" name="smalldes" value="{{ $posts->name;}}" required autocomplete="smalldes" autofocus>
    
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
                                    <input id="detaildes" type="text" class="form-control @error('detaildes') is-invalid @enderror" name="detaildes" value="{{ $posts->name;}}" required autocomplete="detaildes" autofocus>
    
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
                                    {{ __('Update') }}
                                    </button>
                                </div>
                                
                            </div>
                                  
                                  
                                  
                            </div>
                        </div>
                    </form>
                    <h3> Post Name: </h3><br>
                    <h3> Post Slug: </h3><br>
                    <h3> Post Tag: </h3><br>
                    <h3> Post Status: </h3><br>
                    <h3> Small Description: </h3><br>
                    <h3> Details Description: </h3><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
