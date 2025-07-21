<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    public $table = 'blogcomments';
    protected $primaryKey = 'id';

    public function blogcommentreplies()
    {
        return $this->hasMany('App\BlogCommentReplies','comment_id','id');
    }
}
