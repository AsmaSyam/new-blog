<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'user_id'];

    public function blogs(){
        return $this->belongsToMany(
            Blog::class ,
            'blog_tag' ,
            'tag_id',
            'blog_id',
            'id',
            'id'
        );
    }

    public function user(){
        return $this->belongsTo(
            User::class 
        );
    }

   
}
