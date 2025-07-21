<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $guarded = array('id');
    protected $table = 'cart-products';
    public $timestamps = true;
}
