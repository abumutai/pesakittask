@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card" >
                      
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>Name: </strong>{{$user->name}}</li>
                          <li class="list-group-item"><strong>Email: </strong>{{$user->email}}</li>
                          <li class="list-group-item"><strong>Phone Number: </strong>{{$user->phone}}</li>
                        </ul>
                      </div>
                      <a href="{{route('home')}}" class="btn btn-primary mt-3">Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
