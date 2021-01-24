<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sharepost extends Model
{
    //
    //protected $fillable = ['title1', 'content1', 'img1', 'pdf1' , 'title2', 'content2', 'img2', 'pdf2', 'title3', 'content3', 'img3', 'pdf3'];

    protected $fillable = ['user_id', 'title', 'content'];
    //hasmanyのメソッドの場合は'user_id'は不要

 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function postHaveTag()
    {
        return $this->belongsToMany(Tag::class, 'sharepost_tags', 'sharepost_id', 'tag_id')->withTimestamps();
    }
}
