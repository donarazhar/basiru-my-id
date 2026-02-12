<?php

namespace App\Http\Controllers;

use App\Models\DigitalBook;

class DigitalBookController extends Controller
{
    public function index()
    {
        $books = DigitalBook::active()->latest()->paginate(12);
        return view('digital-books.index', compact('books'));
    }

    public function show($id)
    {
        $book = DigitalBook::active()->findOrFail($id);
        return view('digital-books.show', compact('book'));
    }
}
