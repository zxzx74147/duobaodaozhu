<?php

namespace App\Http\Controllers\CF;

/**
 * Created by PhpStorm.
 * User: zhengxin
 * Date: 2017/2/7
 * Time: 下午1:34
 */

class CFHelper
{
    private $zone = 'adc4771baa442a9fdcca9645494464ce';
    private $key = 'fb83c464bc8c6cadf98470e2da51ec3b80313';

    public function invalidateCache($urls)
    {
        $url = 'https://api.cloudflare.com/client/v4/zones/' . $this->zone . '/purge_cache';

        $data = array('files' => $urls,
        );
        $header = 'X-Auth-Email: user@example.com\r\n';
        $header .= 'X-Auth-Key: ' . $this->key . '\r\n';
        $header .= 'Content-Type: application/json\r\n';

        $deledata = http_build_query($data);
        $options = array(
            'http' => array(
                'method' => 'DELETE',
                'header' => $header,
                'content' => $deledata,
                'timeout' => 5 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }
}