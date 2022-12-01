<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $reserves=Reserve::all();
        $books=Book::all();
        $users=Auth::user();
        if(isset(Auth::user()->id)){
            return view("books.index", ['books' => $books , 'reserves' => $reserves]);
        }else{
            return view("auth.login", ['users' => $users]);
        }
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
