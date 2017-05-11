<?php
namespace App\Http\Controllers\Upload;

/**
 * Created by PhpStorm.
 * User: zhengxin
 * Date: 2017/2/7
 * Time: 下午1:43
 */
use App\Http\Controllers\Controller;
use App\Http\Controllers\Oss\OssHelper;
use App\Model\Error;
use App\Model\ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Lib\ReturnHelper;
use App\Http\Controllers\Lib\ParamsHelper;
class UploadController extends Controller
{

    public function uploadImage(Request $request)
    {
        $uid = ParamsHelper::getUidWithToken($request);
        if(!$uid){
            $ret = array(
                'error' => Error::error(Error::$ERROR_UID_ERROR),
            );
            return $ret;
        }
        if (!$request->hasFile('image') || !$request->file('image')->isValid()) {
            $ret = array(
                'error' => Error::error(Error::$ERROR_PARAM_ERROR),
            );
            return $ret;
        }
        $file = $request->image;
        $path = $file->path();
        $fileMd5 = md5_file($path);
        $pix_size=getimagesize($path);
        if($request->has('md5')){
            if($fileMd5!=$request->get('md5')){
                $ret = array(
                    'error' => Error::error(Error::$ERROR_MD5_ERROR),
                );
                return $ret;
            }
        }
        $fileKey = $fileMd5.str_random(8);

        $fileName = $fileKey.'.'.$file->getClientOriginalExtension();

        $ossHelper = new OssHelper();
        $ossRet = $ossHelper->uploadFile($fileName,$path);
        if(!$ossRet){
            $ret = array(
                'error' => Error::error(Error::$ERROR_FILE_ERROR),
            );
            return $ret;
        }

        $model = new ImageModel();
        $model->fill(['key' => $fileName]);
        $model->fill(['user_id' => $uid]);
        $model->fill(['create_time' => time()]);
        $model->fill(['status' => ImageModel::$STATUS_UNKNOWN]);
        $model->fill(['url' => $ossRet]);
        $model->fill(['type' => ImageModel::$TYPE_ACTION]);
        $dbRet=$model->save();

        $ret = array(
            'error' => Error::error(Error::$ERROR_OK),
            'data' => array(
                'image_key'=>$fileName,
            ),
        );
        ReturnHelper::dealDBResult($dbRet,$ret);
        return $ret;
    }
}