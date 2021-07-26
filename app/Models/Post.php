<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id', 'tag_id')->withPivot('created_at');;
    }

    public function getDescription()
    {
        return substr(strip_tags($this->content), 0, 200);
    }

    public function getShowUrl()
    {
        return route('post.show', $this->id);
    }
}
