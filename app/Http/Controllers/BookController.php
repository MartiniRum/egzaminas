<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books=Book::all();
        return view("books.index",['books'=>$books]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->image = $request->image;
        $book->summary = $request->summary;
        $book->pages = $request->pages;
        $book->ISBN = $request->ISBN;
        $book->category = $request->category;
        $book->save();
        return redirect()->route('books.index');
    }

    public function edit(Book  $book)
    {
        return view('books.update', ['book'=>$book]);}

    public function update(Request $request, Book  $book)
    {
        $book->name = $request->name;
        $book->image = $request->image;
        $book->summary = $request->summary;
        $book->pages = $request->pages;
        $book->ISBN = $request->ISBN;
        $book->category = $request->category;
        $book->save();
        return redirect()->route('books.index');
    }

    public function destroy(Book  $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
