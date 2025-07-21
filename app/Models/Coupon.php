<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = array('id');
    protected $table = 'coupons';
    public $timestamps = true;
}
