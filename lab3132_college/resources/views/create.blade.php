@extends('layout')

@section('page-content')
<form action="{{route('employees.store')}}" method="POST">
    @csrf
    <div>
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('name')}}</div>
    </div>
    <div>
        <label for="job_title">job_title</label>
        <input type="text" name="job_title" id="job_title" class="form-control" value="{{old('job_title')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('job_title')}}</div>

    </div>
    <div>
        <label for="joining_date">Joining_date</label>
        <input type="date" name="joining_date" id="joining_date" class="form-control" value="{{old('joining_date')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('joining_date')}}</div>

    </div>
    <div>
        <label for="salary">salary</label>
        <input type="number" name="salary" id="salary" class="form-control" value="{{old('salary')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('salary')}}</div>
    </div>
    <div>
        <label for="email">email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('email')}}</div>
    </div>
    <div>
        <label for="mobile_no">mobile_no</label>
        <input type="number" name="mobile_no" id="mobile_no" class="form-control" value="{{old('mobile_no')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('mobile_no')}}</div>
    </div>
    <div>
        <label for="address">address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" required>
        <div class="invalid-feedbacks">{{$errors->first('address')}}</div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('employees.index')}}" class="btn btn-info">Cancel</a>
    </div>
</form>


@endsection