<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    //Display the Initial Page of our website
    public function index(){
        try{
            $books = Book::where('status',1)->get();
            return view('book.index')->with('books',$books);
        }catch(\Exception $exception){
            return view('book.index')->with('server_error',$exception);
        }
    }

    public function store(Request $request){
        $this->validate($request,[
            'book_name' => 'required',
        ]);

        try{
            $book = new Book;

            $book->name= $request->book_name;
            $book->status = 1;
            $book->save();
    
            return Redirect::route('book.index')->with('success','Book Added');
        }catch(\Exception $exception){
            return view('book.index')->with('server_error',$exception);
        }
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'book_name' => 'required',
        ]);

        try{
            $book = Book::find($id);

            if(is_null($book)) abort(404);

            $book->name = $request->name();
            $book->save();

            return Redirect::route('book.index')->with('edit','Book is Updated');
        }catch(\Exception $exception){
            return view('book.index')->with('server_error',$exception);
        }
    }

    public function destroy($id){
        
    }
}
