<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GpsTrack extends Model
{
    protected $guarded = array('id');
    protected $table = 'gps_track';
    public $timestamps = true;
}
