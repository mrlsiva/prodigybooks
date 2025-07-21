<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $guarded = array('id');
    protected $table = 'boxes';
    public $timestamps = true;
}
