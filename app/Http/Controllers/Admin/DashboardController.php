<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\BestPractice;
use App\Models\DigitalBook;
use App\Models\LibraryItem;
use App\Models\Contact;
use App\Models\Quiz;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'galleries' => Gallery::count(),
            'videos' => Video::count(),
            'practices' => BestPractice::count(),
            'books' => DigitalBook::count(),
            'library' => LibraryItem::count(),
            'quizzes' => Quiz::count(),
            'contacts' => Contact::where('is_read', false)->count(),
            'total_contacts' => Contact::count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts'));
    }
}
