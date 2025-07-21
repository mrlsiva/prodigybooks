<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Distributorship extends Model
{
    protected $guarded = array('id');
    protected $table = 'ourdistributorship';
    public $timestamps = true;
}
