<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LibraryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function index()
    {
        $items = LibraryItem::latest()->paginate(10);
        return view('admin.library.index', compact('items'));
    }

    public function create()
    {
        return view('admin.library.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx|max:20480',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',

        ]);

        $validated['file_path'] = $request->file('file')->store('library', 'public');

        if ($request->hasFile('cover')) {
            $validated['cover_image'] = $request->file('cover')->store('library/covers', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        LibraryItem::create($validated);

        return redirect()->route('admin.library.index')->with('success', 'Item perpustakaan berhasil ditambahkan!');
    }

    public function edit(LibraryItem $library)
    {
        return view('admin.library.form', ['item' => $library]);
    }

    public function update(Request $request, LibraryItem $library)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx|max:20480',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($library->file_path);
            $validated['file_path'] = $request->file('file')->store('library', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($library->cover_image) {
                Storage::disk('public')->delete($library->cover_image);
            }
            $validated['cover_image'] = $request->file('cover')->store('library/covers', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $library->update($validated);

        return redirect()->route('admin.library.index')->with('success', 'Item perpustakaan berhasil diperbarui!');
    }

    public function destroy(LibraryItem $library)
    {
        Storage::disk('public')->delete($library->file_path);
        if ($library->cover_image) {
            Storage::disk('public')->delete($library->cover_image);
        }
        $library->delete();

        return redirect()->route('admin.library.index')->with('success', 'Item perpustakaan berhasil dihapus!');
    }
}
