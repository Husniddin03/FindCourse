<?php

namespace App\Http\Controllers;

use App\Models\LearningCenter;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function blogGrid()
    {
        $LearningCenters = LearningCenter::all();
        return view('pages.blog-grid')->with('LearningCenters', $LearningCenters);
    }
    public function blogSingle($id)
    {
        $LearningCenter = LearningCenter::find($id);
        return view('pages.blog-single')->with('LearningCenter', $LearningCenter);
    }
    public function signin()
    {
        return view('pages.signin');
    }
    public function signup()
    {
        return view('pages.signup');
    }
    public function notFound()
    {
        return view('pages.404');
    }
}
