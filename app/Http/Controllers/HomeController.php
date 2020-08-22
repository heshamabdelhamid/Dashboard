<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::count();
        $users = User::count();
        $categories = Category::count();
        return view('dashboard', compact('news', 'users', 'categories'));
    }
}
