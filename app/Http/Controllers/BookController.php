<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
class BookController extends Controller
{

    public function addBook(Request $request)
    {
    //        Validator::validate($request->upload, [
    //            'attachment' => [
    //                'required',
    //                File::types(['png', 'webp', 'jpg'])
    //            ],
    //        ]);
    //        Validator::validate($request->title, [
    //            'attachment' => [
    //                'required',
    //            ],
    //        ]);

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->image = $request->upload;

        if ($request->hasFile('upload')) {
            $image = $request->file('upload');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $book->image = 'images/' . $imageName;
        }

        $book->save();
        return redirect()->route('show');
    }

    public function ShowBook()
    {
        $articles = Book::all();

        return view('books', compact('articles'));
    }

    public function delete($id)
    {
        Book::find($id)->delete();
        return redirect()->route('show');
    }


    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book ->title=$request->input('title');
        $book->description=$request->input('description');
        $book ->save();
        return redirect()->route('show');
    }

    public function seeBookDetails($id)
    {
        $book = Book::find($id);
        return view('detials' , ['book' => $book]);
    }
}
