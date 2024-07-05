@extends('layouts.app')
@section('title')
Add New Book
@endsection

@section('content')
<form action="{{route('books.update', ['book' => $book])}}" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{$book->title ? $book->title:old('title')}}">
        <div class="invalid-feedbacks">{{$errors->first('title')}}</div>
    </div>
    <div>
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" value="{{$book->author ? $book->author:old('author')}}">
        <div class="invalid-feedbacks">{{$errors->first('author')}}</div>

    </div>
    <div>
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" id="isbn" class="form-control" value="{{$book->isbn ? $book->isbn:old('isbn')}}">
        <div class="invalid-feedbacks">{{$errors->first('isbn')}}</div>
    </div>
    <div>
        <label for="stock">STOCK</label>
        <input type="text" name="stock" id="stock" class="form-control" value="{{$book->stock ? $book->stock:old('stock')}}">
        <div class="invalid-feedbacks">{{$errors->first('stock')}}</div>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" class="form-control" value="{{$book->price ? $book->price:old('price')}}">
        <div class="invalid-feedbacks">{{$errors->first('price')}}</div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('books.index')}}" class="btn btn-info">Cancel</a>
    </div>
</form>


@endsection