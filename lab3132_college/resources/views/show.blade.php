@extends('layout')

@section('page-content')

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{$employs->name}}</h5>
        <p class="card-text">Author : {{$employs->job_title}}</p>
        <p class="card-text">ISBN : {{$employs->salary}}</p>
        <p class="card-text">Price : {{$employs->mobile_no}}</p>
        <a href="" class="btn btn-primary">Edit</a>
        <a href="{{route('employees.index')}}" class="btn btn-secondary">Cancel</a>

    </div>
</div>
@endsection