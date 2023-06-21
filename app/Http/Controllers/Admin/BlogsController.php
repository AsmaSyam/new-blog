<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User ;
use App\Models\Category ;
use App\Models\Tag ;
use App\Models\Blog ;

class BlogsController extends Controller
{
    public function index(){
        $categories = Category::paginate(6);
       return view('admin.blogs.index' , [
        'categories'=>$categories 
       ]);
    }

    public function create(){
        $categories = Category::all();
        return view('admin.blogs.create' ,[
            'categories' => $categories ,
        ]
         );
    }

    public function store(Request $request){
        
       $request->validate([
        'name' => 'required | string' ,
       ]);
       
       $data = $request->all();
       $data['user_id'] = 1;
       $ss = Category::create($data);
       return redirect()->back() ;
    }


    public function delete($id){
      $category = Category::findOrFail($id);
      $category->delete();
      return redirect()->back() ;
    }

    public function edit($id){
       $category = Category::findOrFail($id);
       return view('admin.blogs.edit' ,[
        'category' => $category ,
       ]);
    }

    public function update(Request $request , $id){
        
        $request->validate([
         'name' => 'required|string' ,
        ]);

        $data = $request->all();
        $category = Category::findOrFail($id);
          $category->update($data);
        return redirect()->back() ;
     }

    
    //Tags
    //
    //
    //

    public function indexTag(){
        $tags = Tag::paginate(6);
        return view('admin.blogs.tag' , [
         'tags'=>$tags 
        ]);
    }

    public function createTag(){
        $tags = Tag::all();
        return view('admin.blogs.tagCreate' ,[
            'tags' => $tags ,
        ]);
    }

    public function tagStore(Request $request){
        $request->validate([
            'name' => 'required | string' 
                   ]);
           
           $data = $request->all();
           $tt = Tag::create($data);
           $data['user_id'] = 1;
           return redirect()->back() ;
    }

    public function tagDelete($id){
       $tag = Tag::findOrFail($id);
       $tag->delete();
       return redirect()->back();
    }
    
    
    public function tagEdit($id){
        $tag = Tag::findOrFail($id);
        $users = User::all();
        return view('admin.blogs.tagEdit' ,[
         'tag' => $tag ,
        ]);
     }
     
     public function tagUpdate(Request $request , $id){
        
        $request->validate([
         'name' => 'required | string' ,
        ]);

        $data = $request->all();
        $tag = Tag::findOrFail($id);
          $tag->update($data);
        return redirect()->back() ;
     }


} 
