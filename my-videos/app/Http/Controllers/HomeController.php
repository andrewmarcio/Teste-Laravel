<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user_id = Auth::user()->id;
        
        $listFavoriteCategoryVideos = DB::table('categories')
            ->join('favorite_categories', 'categories.id', '=', 'favorite_categories.category_id')
            ->where('favorite_categories.user_id', $user_id)
            ->orderBy('categories.id', 'DESC')
            ->select(['categories.id', 'categories.name'])->get();
        
        return view('home', compact('listFavoriteCategoryVideos'));
    }
}
