<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function home()
    {
      $posts = Post::latest()->paginate(5);
      return view('auth.home', compact('posts'));
    }
}
