<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAction extends Model
{
    use HasFactory;

    public function blog(){
        return $this->belongsTo(
            Blog::class 
        )->withDefault([
            'di' => 0 ,
            'likes' => 0 ,
            'views' => 0
        ]);
    }
}
