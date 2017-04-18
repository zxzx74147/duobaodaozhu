<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $table = 'user';
    protected $connection = 'mysql_dunkeng';

    public $timestamps = false;

//    public $id;
//    public $sex;
//    public $name;
//    public $portrait;
//    public $age;
//    public $tag;
//    public $device_id;
//    public $status;
//    public $device_info;
//    public $token;
//    public $token_timeout;
//    public $auth;
//    public $auth_type;
//    public $push_id;

    protected $fillable = array('id','sex','name','password','portrait','age',
        'tag','device_id','status','device_info','token','token_timestamp','auth','auth_type','push_id');
    //
}
