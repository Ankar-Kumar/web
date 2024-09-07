@extends('layout')

@section('page-content')
<form action="" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Title</label>
        <input type="text" name="name" class="form-control">
        <div>{{$errors->first('name')}}</div>
    </div>
    {{-- <div>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control">
        <div>{{$errors->first('author')}}</div>

    </div>
    <div>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control">
        <div>{{$errors->first('isbn')}}</div>
    </div>
    <div>
        <label for="stock">STOCK</label>
        <input type="text" name="stock" id="stock" class="form-control" >
        <div>{{$errors->first('stock')}}</div>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control" >
        <div>{{$errors->first('price')}}</div>
    </div> --}}

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('employees.index')}}" class="btn btn-info">Cancel</a>
    </div>
</form>


@endsection