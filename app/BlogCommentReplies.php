<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCommentReplies extends Model
{
    public $table = 'blogcommentreplies';
	protected $primaryKey = 'id';

    public function blogcomments() {
        return $this->belongsTo('App\BlogComments','comment_id','id');
    }
}
