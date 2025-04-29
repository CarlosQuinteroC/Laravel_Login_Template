<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //List all Books and sent it to the index view
    public function index(){
        $books = Book::all(); //return all books in a variable
        return view('books.index', compact('books'));
    }
//return the create view
public function create(){
        return view('books.create');
}


// Store a new book
    public function store(Request $request)
    {
        // Validate incoming request
        $validatedAttributes = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'coverImage' => 'required|string', // If it's a URL or filename
        ]);

        // Check if user is logged in and is admin
        $user = Auth::user(); // get the current authenticated user

        if (! $user || ! $user->isAdmin()) {
            return redirect('/login')->withErrors('You must be an admin to create a book.');
        }
        // Save the book linked to the user
        $book = new Book($validatedAttributes);
        $book->user_id = $user->id; // Assign the book to the current user (admin)
        $book->save();

        // 4. Redirect or return success
        return redirect('/')->with('success', 'Book created successfully!');
    }

    // Display a specific book posting.
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Show the form to edit an existing book (only by the owner).
    public function edit(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('books.edit', compact('book'));
    }

    // Update an existing book.
    public function update(Request $request, Book $book)
    {
        // Verify authorization.
        if (Auth::id() !== $book->user_id) {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:100',
            'coverImage' => 'required|string', // If it's a URL or filename
        ]);
        $book->update($request->only('title', 'author', 'description', 'genre', 'coverImage'));
        return redirect()->route('books.show', $book)->with('success', 'book updated!');
    }

    // Delete a job posting.
    public function destroy(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(403, 'Unauthorized');
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'book deleted!');
    }
}
