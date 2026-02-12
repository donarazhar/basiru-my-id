<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestPractice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BestPracticeController extends Controller
{
    public function index()
    {
        $practices = BestPractice::latest()->paginate(10);
        return view('admin.best-practices.index', compact('practices'));
    }

    public function create()
    {
        return view('admin.best-practices.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'author' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('best-practices', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        BestPractice::create($validated);

        return redirect()->route('admin.best-practices.index')->with('success', 'Praktik Baik berhasil ditambahkan!');
    }

    public function edit(BestPractice $bestPractice)
    {
        return view('admin.best-practices.form', ['practice' => $bestPractice]);
    }

    public function update(Request $request, BestPractice $bestPractice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'author' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('image')) {
            if ($bestPractice->image_path) {
                Storage::disk('public')->delete($bestPractice->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('best-practices', 'public');
        }

        $validated['is_active'] = $request->has('is_active');
        $bestPractice->update($validated);

        return redirect()->route('admin.best-practices.index')->with('success', 'Praktik Baik berhasil diperbarui!');
    }

    public function destroy(BestPractice $bestPractice)
    {
        if ($bestPractice->image_path) {
            Storage::disk('public')->delete($bestPractice->image_path);
        }
        $bestPractice->delete();

        return redirect()->route('admin.best-practices.index')->with('success', 'Praktik Baik berhasil dihapus!');
    }
}
