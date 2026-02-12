<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Video;
use App\Models\Quiz;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $galleries = Gallery::active()->ordered()->get();
        $videos = Video::active()->ordered()->get();
        $quiz = Quiz::active()->first();

        return view('home', compact('galleries', 'videos', 'quiz'));
    }
}
