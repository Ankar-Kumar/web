@extends('layout')


@section('page-content')
<style>
    .pagination > li {
        margin-left: 10px; /* Adjust this value to increase spacing */
    }
</style>


<div class="d-flex justify-content-between mb-3">
    
    <a href="{{Route('employees.create')}}" class="btn btn-success">Add Employee</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="bg-dark text-white text-center">
        <th>ID</th>
        <th>Name</th>
        <th>Job_title</th>
        <th>Salary</th>
        <th>Email</th>
        <th>Mobile_no</th>
        <th>Address</th>
        <th>other</th>
    </thead>

     
    <tbody class="text-center">
        @foreach($employs as $employ)
        <tr>
            <td>{{$employ->id}}</td>
            <td>{{$employ->name}}</td>
            <td>{{$employ->job_title}}</td>
            <td>{{$employ->salary}}</td>
            <td>{{$employ->email}}</td>
             <td>{{$employ->mobile_no}}</td>
            <td>{{$employ->address}}</td>
            <td class="d-flex justify-content-center">
                <a href="{{route('employees.show', $employ->id)}}" class="ms-1 btn btn-sm btn-secondary">View</a>
                <a href="{{route('employees.edit', $employ->id)}}" class="ms-1 btn btn-sm btn-primary">Edit</a>
                <form action="{{route('employees.destroy',$employ->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ms-1 btn btn-danger" onclick="return confirm('are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    <ul class="pagination" style="list-style-type: none; padding-left: 0;">
        {{$employs->links()}}
    </ul>
</div>


@endsection