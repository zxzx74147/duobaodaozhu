<?php

namespace App\Http\Controllers\Oss;

/**
 * Created by PhpStorm.
 * User: zhengxin
 * Date: 2017/2/7
 * Time: 下午1:34
 */
use OSS\Core\OssException;
use OSS\OssClient;

class OssHelper
{
    private $accessKeyId = "LTAIcGmVNHiRCKoj";
    private $accessKeySecret = "KcDku3m2Y6rOPQ6xEyLlYuUxNFPfMa";
    private $endpoint = "http://oss-ap-northeast-1.aliyuncs.com";
    private $bucket = "duobaosousou";

    public function getOssClient()
    {
        try {
            $ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
            $ossClient->setTimeout(60 /* seconds */);
            $ossClient->setConnectTimeout(10 /* seconds */);
            return $ossClient;
        } catch (OssException $e) {
            print $e->getMessage();
        }
        return false;
    }

    public function uploadString($key, $content)
    {
        $ossClient = $this->getOssClient();
        if (!$ossClient) {
            return false;
        }
        try {
            $ossClient->putObject($this->bucket, $key, $content);
        } catch (OssException $e) {
            print $e->getMessage();
        }
        return false;
    }

    public function uploadFile($key, $file)
    {
        $ossClient = $this->getOssClient();
        if (!$ossClient) {
            return false;
        }
        try {
            $options = array(OssClient::OSS_CHECK_MD5 => true);
            $ossClient->uploadFile($this->bucket, $key, $file,$options);
            $url = $ossClient->signUrl($this->bucket,$key);
            return $url;
        } catch (OssException $e) {
            print $e->getMessage();
        }
        return false;
    }
}