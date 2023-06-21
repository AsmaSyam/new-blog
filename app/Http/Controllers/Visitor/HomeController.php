<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog ;

class HomeController extends Controller
{
    public function home(){
       $blogs = Blog::where('type','1')->latest()->take(3)->get();
        return view('website.home')->with([
            'blogs' => $blogs
        ]);
    }
}
