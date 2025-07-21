<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBoxBook extends Model
{
    protected $guarded = array('id');
    public $table = 'user_box_books';
    public $timestamps = true;
}
