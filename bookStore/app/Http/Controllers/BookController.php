<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //

    public function index(){

        $books=Book::paginate(10);
        return View('index')->with('books',$books);
    }
    public function show($id){
        $books=Book::find($id);
        return View('show')->with('book', $books);
    }
    public function create(){
        return view('create');
    }
    protected function validateBookRequest($request)
    {
        $rules = [
                'title' => 'required',
                'author' => 'required',
                'isbn' => 'required|max:13',
                'stock' => 'required|numeric|integer|gte:0',
                'price' => 'required|numeric',
            ];

        $messages = [
            'stock.gte' => 'The stock must be greater than or equal to 0.',
        ];

        $request->validate($rules, $messages);
    }

    public function store(Request $request){
        $this->validateBookRequest($request);

        // option 1 name same hoile eivabe apply korbo
        // $book= Book::create($request->all());

        //option 2 if form er field name ar db er field name alada hoile 
        $book =new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->price = $request->price;
        $book->save();

        return redirect()->route('books.show',$book->id);

    }

    public function destroy(Request $request, $id){
        $book= Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
    //extra word for update 
    public function edit($id)
    {
        $books = Book::find($id);
        return View('edit')->with('book', $books);
    }

    public function update(Request $request, Book $book)
    {
        $this->validateBookRequest($request);
        $book->update([
            'title'     => $request->input('title'),
            'author'    => $request->input('author'),
            'isbn'      => $request->input('isbn'),
            'stock'     => $request->input('stock'),
            'price'     => $request->input('price'),
            
        ]);

        return redirect()->route('books.index')->with('success', 'Book Updated Succesfully');
    }


}
