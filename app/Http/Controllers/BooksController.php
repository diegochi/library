<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Book;
use App\Category;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::select('books.id', 'books.name', 'books.author', 'categories.name as category', 'books.published_date', 'books.available', 'books.user')->leftJoin('categories', 'categories.id', '=', 'books.category')->paginate(10);
      return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all()->toArray();
      return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $published = Carbon::parse($request->get('published'));
      $book = new Book(
        [
          'name' => $request->get('name'),
          'author' => $request->get('author'),
          'category' => $request->get('category'),
          'published_date' => $published->format('Y-m-d'),
          'available' => $request->get('available'),
          'user' => $request->has('user') ? $request->get('user') : '',
        ]
      );
      $book->save();
      return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Book::find($id);
      $published = Carbon::parse($book->published_date);
      $published = $published->format('m/d/Y');
      $categories = Category::all()->toArray();
      return view('books.edit', compact('book', 'id', 'categories', 'published'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $published = Carbon::parse($request->get('published'));
      $book = Book::find($id);
      $book->name = $request->get('name');
      $book->author = $request->get('author');
      $book->category = $request->get('category');
      $book->published_date = $published->format('Y-m-d');
      $book->available = $request->get('available');
      $book->user = $request->has('user') ? $request->get('user') : '';
      $book->save();
      return redirect('/books');
    }

     /**
     * Change status of book availibility.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changestatus(Request $request)
    {
      if($request->ajax())
      {
        $id = $request->get('id');
        $book = Book::find($id);
        $book->available = $request->get('available');
        $book->user = $request->has('user') ? $request->get('user') : '';
        $book->save();
        return response()->json(['js'=>'window.location.href="/books"']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $book = Book::find($id);
      $book->delete();
      return redirect('/books');
    }

    /**
     * Search book
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
      $notfoundmsg = '';
      $search = $request->get('search');
      $foundbooks = Book::select('books.id', 'books.name', 'books.author', 'categories.name as category', 'books.published_date', 'books.available', 'books.user')->leftJoin('categories', 'categories.id', '=', 'books.category')->where('books.name', 'like', '%' . $search . '%')->orWhere('books.author', 'like', '%' . $search . '%')->paginate(10);
      if(count($foundbooks) == 0) $notfoundmsg = 'No books found.';
      return view('books.search', compact('foundbooks', 'search', 'notfoundmsg'));
    }
}
