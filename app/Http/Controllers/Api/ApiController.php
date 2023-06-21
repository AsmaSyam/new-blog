<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag ;

class ApiController extends Controller
{
    public function getTages(){
        $tags = Tag::Paginate(5);
        return $tags ;
    }

    public function getTag($id){
      $tag = Tag::findOrFail($id);
      return $tag ;
    }

    public function delete(Tag $tag){
        $tag->delete();
        return response()->json([
            'message' => 'Done delete the tag',
            'state' => '200',
        ]);
    }


    public function create(Request $request){

        $request->validate([
            'name' => 'required'
        ]);
         $tag = Tag::create([
            'name' =>$request->name ,
            'user_id' => 1
         ]);
        
         return $tag ;
    }

    public function updateTag(Request $request , $id){
        $tag = Tag::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $tag->update([
            'name' => $request->name  ,
            'user_id' => 1
        ]);

        return $tag ;
    }
}
