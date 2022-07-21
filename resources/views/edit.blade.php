@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="post" action="{{route('edituser')}}">
                        @csrf
                        <input id="role" type="hidden" class="form-control" name="role" value="{{ Auth::user()->role;}}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name;}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                               <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">{{__('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname;}}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if( Auth::user()->role != 2)
                        <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">Role</label>
                            
                            <?php
                            $admin=$mem=$cust="";
                            if(Auth::user()->role == 1)
                                $admin="checked";
                            elseif(Auth::user()->role == 2)
                                $mem="checked";
                            else
                                $cust="checked";
                            ?>
                            <div class="col-md-6">
                                <div class="row mb-12">
                                    @if ( Auth::user()->role == 1)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="role1" value="1" {{$admin}}>
                                            <label class="form-check-label" for="exampleRadios1">
                                              Admin
                                            </label>
                                          </div>
                                    </div>
                                    @endif
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="role2" value="2" {{$mem}}>
                                            <label class="form-check-label" for="role2">
                                              Member
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="role" id="role3" value="3" {{$cust}}>
                                            <label class="form-check-label" for="role3">
                                              Customer Service
                                            </label>
                                        </div>
                                       
                                    </div>
                                </div>
                              
                            </div>

                        </div>
                        @endif
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
