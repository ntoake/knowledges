<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SharepostTag extends Model
{
    protected $fillable = ['sharepost_id', 'tag_id'];
    //
    /*public function postHaveTag()
    {
        return $this->belongsToMany(sharepost::class, 'sharepost_tags', 'sharepost_id', 'tag_id')->withTimestamps();
    } */
    
}
