<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    /*public function getTitleAttribute(){
        return ucfirst($this->title);
    }*/

    protected $fillable = [  
     'id' ,	'title'	,'details','user_id',
     'category_id','type', 'created_at',
     'blog_img',
     'updated_at' ,
    ];

    use HasFactory;

    public function category(){
        return $this->belongsTo(
            category::class,
            'category_id', // الفورن كي بكون عند الرابطة بتكون عنده ماني فهاي بتكون موجودة عند جدول بلوق
            'id'
        )->withDefault([
            'name' =>'N/A'  
        ]);
    }


    public function user(){
        return $this->belongsTo(
            user::class,
            'user_id',
            'id'
        );
    }


    public function tags(){
        return $this->belongsToMany(
            Tag::class ,
            'blog_tag',
            'blog_id',
            'tag_id',
            'id',
            'id',
        );
    }

    public function comments(){
        return $this->hasMany(
            Comment::class ,
            'blog_id',
            'id'
        );
    }

    public function blogAction(){
        return $this->hasOne(
            BlogAction::class,
            'blog_id',
            'id' 
        )->withDefault([
            'id' => 0 ,
            'likes' => 0 ,
            'views' => 0 ,
        ]);
    }

}
