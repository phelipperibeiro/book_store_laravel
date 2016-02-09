<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
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
        $categories = Category::lists('name', 'id');
        return view('admin.books.edit', compact('book','categories'));
    }

    public function update(Request $request, $id)
    {
        Book::find($id)->update($request->all());
        return redirect()->route('admin.books.index');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('admin.books.index');
    }

}
