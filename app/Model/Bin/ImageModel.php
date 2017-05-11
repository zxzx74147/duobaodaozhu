<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    public static $STATUS_UNKNOWN = 0;
    public static $STATUS_OK = 1;
    public static $STATUS_DELETE = 2;

    public static $TYPE_SYSTEM = 1;
    public static $TYPE_ACTION = 2;
    public static $TYPE_UGC = 3;
    //
    public $table = 'image_table';

//    public $id;
//    public $type;
//    public $color;
//    public $status;
//    public $comment;
//    public $start_time;
//    public $end_time;
//    public $image;
    public $timestamps = false;

    protected $fillable = array('id', 'key', 'user_id', 'create_time', 'status', 'type','url');
    protected $primaryKey = 'id';
}
