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

                   
                    <h3> First Name:  {{ Auth::user()->name;}}</h3><br>
                    <h3> Last Name:   {{Auth:: user()->lastname;}}</h3><br>
                    <h3> Address: {{Auth:: user()-> address;}}</h3><br>
                    <h3> Email: {{Auth:: user()->email;}}</h3><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
