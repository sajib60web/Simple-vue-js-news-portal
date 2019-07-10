<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = ['visitor_id', 'blog_id', 'blog_title', 'comment'];
}
