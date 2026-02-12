<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::latest()->paginate(10);
        return view('admin.quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('admin.quizzes.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'google_form_url' => 'required|string|max:500',

        ]);

        $validated['is_active'] = $request->has('is_active');
        Quiz::create($validated);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz berhasil ditambahkan!');
    }

    public function edit(Quiz $quiz)
    {
        return view('admin.quizzes.form', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'google_form_url' => 'required|string|max:500',

        ]);

        $validated['is_active'] = $request->has('is_active');
        $quiz->update($validated);

        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz berhasil diperbarui!');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('admin.quizzes.index')->with('success', 'Quiz berhasil dihapus!');
    }
}
