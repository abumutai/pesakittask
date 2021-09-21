@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registered Users') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td><a href="{{route('profile.show',$item->id)}}" class="btn btn-primary">View Profile</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row">No users Registered</th>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
