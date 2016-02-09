<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('book_manage_all')) {
            $books =  Book::all();
        } else {
            $books = Book::whereUserId(auth()->user()->id)->get();
        }
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::lists('name', 'id');
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Book::create($input);
        return redirect()->route('admin.books.index');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        
        //if (auth()->user()->can('manageBook', $book)) {
        //if (Gate::denies('manageBook', $book)) {
        if (Gate::denies('manageBook', $book)) {
            abort(403, 'voce não é o dono desse livro');
        }

        $categories = Category::lists('name', 'id');
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {   $book = Book::find($id);
    
        if (Gate::denies('manageBook', $book)) {
            abort(403, 'voce não é o dono desse livro');
        }
        
        $book->update($request->all());
        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
    
        if (Gate::denies('manageBook', $book)) {
            abort(403, 'voce não é o dono desse livro');
        }
        
        $book->delete();
        return redirect()->route('admin.books.index');
    }

}
