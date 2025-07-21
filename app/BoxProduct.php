<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxProduct extends Model
{
    protected $guarded = array('id');
    public $table = 'box_products';
    public $timestamps = true;
}
