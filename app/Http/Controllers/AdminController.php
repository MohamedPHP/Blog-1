<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class AdminController extends Controller
{
    public function getIndex()
    { // views admin index page
        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get();
        return view('admin.index', ['posts' => $posts]);
    }
}
