<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DigitalBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DigitalBookController extends Controller
{
    public function index()
    {
        $books = DigitalBook::latest()->paginate(10);
        return view('admin.digital-books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.digital-books.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:20480',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'author' => 'nullable|string|max:255',

        ]);

        $validated['file_path'] = $request->file('file')->store('digital-books', 'public');

        if ($request->hasFile('cover')) {
            $validated['cover_image'] = $request->file('cover')->store('digital-books/covers', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        DigitalBook::create($validated);

        return redirect()->route('admin.digital-books.index')->with('success', 'Buku Digital berhasil ditambahkan!');
    }

    public function edit(DigitalBook $digitalBook)
    {
        return view('admin.digital-books.form', ['book' => $digitalBook]);
    }

    public function update(Request $request, DigitalBook $digitalBook)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:20480',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'author' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($digitalBook->file_path);
            $validated['file_path'] = $request->file('file')->store('digital-books', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($digitalBook->cover_image) {
                Storage::disk('public')->delete($digitalBook->cover_image);
            }
            $validated['cover_image'] = $request->file('cover')->store('digital-books/covers', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $digitalBook->update($validated);

        return redirect()->route('admin.digital-books.index')->with('success', 'Buku Digital berhasil diperbarui!');
    }

    public function destroy(DigitalBook $digitalBook)
    {
        Storage::disk('public')->delete($digitalBook->file_path);
        if ($digitalBook->cover_image) {
            Storage::disk('public')->delete($digitalBook->cover_image);
        }
        $digitalBook->delete();

        return redirect()->route('admin.digital-books.index')->with('success', 'Buku Digital berhasil dihapus!');
    }
}
