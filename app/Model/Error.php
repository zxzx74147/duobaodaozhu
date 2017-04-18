<?php

namespace App\Model;

class Error
{

    public static $ERROR_OK = 200;

    public static $ERROR_PARAM_ERROR = 501;
    public static $ERROR_MD5_ERROR = 502;
    public static $ERROR_DUP_ERROR = 503;
    public static $ERROR_UID_ERROR = 504;

    public static $ERROR_DB_ERROR = 551;

    public static $ERROR_FILE_ERROR = 552;

    public static function error($error)
    {
        $ret = array(
            'error' =>$error,
            'errorStr'=>null
        );
        switch ($error){
            case Error::$ERROR_OK:
                $ret['errorStr'] = 'OK';
                break;
            case Error::$ERROR_PARAM_ERROR:
                $ret['errorStr'] = 'params error';
                break;
            case Error::$ERROR_DUP_ERROR:
                $ret['errorStr'] = 'params duplicate';
                break;
            case Error::$ERROR_UID_ERROR:
                $ret['errorStr'] = 'uid error';
                break;
            case Error::$ERROR_MD5_ERROR:
                $ret['errorStr'] = 'md5 verify fail';
                break;
            case Error::$ERROR_DB_ERROR:
                $ret['errorStr'] = 'db error';
                break;
            case Error::$ERROR_FILE_ERROR:
                $ret['errorStr'] = 'file storage error';
                break;
        }
        return $ret;
    }
}
