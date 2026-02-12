<?php

namespace App\Http\Controllers;

use App\Models\LibraryItem;

class LibraryController extends Controller
{
    public function index()
    {
        $category = request('category');
        $query = LibraryItem::active()->latest();

        if ($category) {
            $query->where('category', $category);
        }

        $items = $query->paginate(12);
        $categories = LibraryItem::active()->whereNotNull('category')->distinct()->pluck('category');

        return view('library.index', compact('items', 'categories', 'category'));
    }
}
