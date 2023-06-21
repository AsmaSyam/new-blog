<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog ;

class UsersController extends Controller
{
    public function index(){  //وصلت هنا بكرا سيبيكي منها وكملي الفيديو
        $blog = Blog::get();
        //dd($blog);
        return view('admin.blogs.index' , [
         'blog'=>$blog 
        ]);
     }
}