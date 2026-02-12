<?php

namespace App\Http\Controllers;

use App\Models\BestPractice;

class BestPracticeController extends Controller
{
    public function index()
    {
        $practices = BestPractice::active()->latest()->paginate(12);
        return view('best-practices.index', compact('practices'));
    }

    public function show($id)
    {
        $practice = BestPractice::active()->findOrFail($id);
        $related = BestPractice::active()->where('id', '!=', $id)->latest()->take(3)->get();
        return view('best-practices.show', compact('practice', 'related'));
    }
}
