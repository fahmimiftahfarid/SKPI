<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
    	$title = 'Data Buku';

    	$books = Book::all();

    	return view('books.index', compact('title', 'books'));
    }

    public function store(Request $request)
    {
    	Book::create($request->all());

    	return redirect()->route('book.index');
    }

    public function update(Book $book, Request $request)
    {
    	$book->update($request->all());

    	return redirect()->route('book.index');
    }

    public function destroy(Book $book)
    {
    	$book->delete();

    	return redirect()->route('book.index');
    }
}
